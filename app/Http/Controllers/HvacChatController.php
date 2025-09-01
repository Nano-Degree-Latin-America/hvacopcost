<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class HvacChatController extends Controller
{
    protected $openai;

    public function __construct(OpenAIService $openai)
    {
        $this->openai = $openai;
    }

    // Filtro rápido basado en keywords (PHP 7.4 friendly)
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
        // (puedes poner false si quieres bloquear TODO lo que no tenga keyword)
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
            'conversation_id' => 'nullable|string|max:64',
        ]);

        $msg = $request->input('message');

        // 1) FAQ directo (ahorra costos)
        if ($answer = $this->faqHit($msg)) {
            return response()->json([
                'source'   => 'faq',
                'response' => $answer,
            ]);
        }

        // 2) Filtro de tema HVAC
        if (!$this->isHVACTopic($msg)) {
            return response()->json([
                'source'   => 'guardrail',
                'response' => "Lo siento, solo puedo ayudar con temas de HVAC. ¿Puedes reformular tu pregunta relacionada con equipos HVAC?",
            ]);
        }


        // 3) Contexto opcional: podrías inyectar extractos de tu KB
        $context = []; // p.ej. últimos logs de la conversación o fragmentos de manuales

        try {
            $answer = $this->openai->chatHVAC($msg, $context);

            // (Opcional) guardar en BD conversación y mensajes
            return response()->json([
                'source'   => 'openai',
                'response' => $answer,
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
}
