<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;
use App\ConversationModel;
use App\HvacMessageModel;
use Illuminate\Support\Facades\Auth;

class HvacChatController extends Controller
{
    protected $openai;

    public function __construct(OpenAIService $openai)
    {
        $this->openai = $openai;
    }

    // Filtro rápido basado en keywords
    protected function isHVACTopic(string $text): bool
    {
        $text = mb_strtolower($text, 'UTF-8');
        $kw = config('hvac.hvac_keywords', []);
        foreach ($kw as $k) {
            if (mb_strpos($text, mb_strtolower($k, 'UTF-8')) !== false) {
                return true;
            }
        }
        // Permite preguntas generales si parecen técnicas pero sin keyword clara

        return false;
    }

    protected function faqHit(string $text): ?string
    {
        $text = mb_strtolower(trim($text), 'UTF-8');
        $faq = config('hvac.faq', []);
        foreach ($faq as $q => $a) {
            if ($text === mb_strtolower($q, 'UTF-8')) {
                return $a;
            }
        }
        return null;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $msg = $request->input('message');
        $id_user = $request->input('user_id');

         // Aseguramos que la conversación exista
        $conversation = ConversationModel::firstOrCreate([
            'user_id' => $id_user,
        ]);

        // Guardar mensaje del usuario
        HvacMessageModel::create([
            'conversation_id' => $conversation->id,
            'role' => 'user',
            'content' => $msg,
        ]);


        // 1) Filtro FAQ directo
        if ($answer = $this->faqHit($msg)) {

             // Guardar respuesta del bot
                HvacMessageModel::create([
                    'conversation_id' => $conversation->id,
                    'role' => 'bot',
                    'content' => $answer,
                ]);
            return response()->json([
                'source'   => 'faq',
                'response' => $answer,
                //'history'  => $conversation->messages()->get(['sender','content','created_at']),
            ]);
        }

        // 2) Filtro de tema HVAC
        if (!$this->isHVACTopic($msg)) {

                HvacMessageModel::create([
                    'conversation_id' => $conversation->id,
                    'role' => 'bot',
                    'content' => "Lo siento, solo puedo ayudar con temas de HVAC. ¿Puedes reformular tu pregunta relacionada con equipos HVAC?",
                ]);

            return response()->json([
                'source'   => 'guardrail',
                'response' => "Lo siento, solo puedo ayudar con temas de HVAC. ¿Puedes reformular tu pregunta relacionada con equipos HVAC?",
                //'history'  => $conversation->messages()->get(['sender','content','created_at']),
            ]);
        }


        // 3) Contexto: inyectar extractos
        $context = [];

        try {
            $answer = $this->openai->chatHVAC($msg, $context);

            HvacMessageModel::create([
                                'conversation_id' => $conversation->id,
                                'role' => 'bot',
                                'content' => $answer,
                            ]);


            return response()->json([
                'source'   => 'openai',
                'response' => $answer,
                'conversation_id' =>  $conversation->id
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $status = $e->getResponse()->getStatusCode();
            $body = json_decode($e->getResponse()->getBody()->getContents(), true);
            $message = $body['error']['message'] ?? 'Error desconocido';

            return response()->json(['error' => "Error $status: $message"], $status);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }

    public function history($userId)
{
                $id_conversation = ConversationModel::where('user_id', $userId)->firstOrFail();
                $history = HvacMessageModel::where('conversation_id', $id_conversation->id)
                ->orderBy('created_at', 'asc')
                ->get(['role','content','created_at']);

    return response()->json($history);
}


}
