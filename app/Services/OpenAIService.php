<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.openai.key');
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'timeout'  => 30,
            'headers'  => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    public function chatHVAC(string $userMessage, array $context = []): string
    {
        // Mensaje del sistema: limita a HVAC y define negativa educada si es off-topic
        $system = "Eres un asistente de soporte TÉCNICO especializado EXCLUSIVAMENTE en HVAC (calefacción, ventilación, aire acondicionado y refrigeración).
- Responde con precisión y concisión.
- Si la pregunta NO es de HVAC, responde exactamente:
  'Lo siento, solo puedo ayudar con temas de HVAC. ¿Puedes reformular tu pregunta relacionada con equipos HVAC?'
- Si falta información, solicita datos (modelo, síntomas, mediciones, ambiente).
- Prioriza seguridad y buenas prácticas.";

        // Inyecta contexto opcional (FAQ, políticas, glosario)
        $contextText = '';
        if (!empty($context)) {
            $contextText = "Contexto de referencia (no repitas literal, úsalo para fundamentar):\n";
            foreach ($context as $c) {
                $contextText .= "- " . trim($c) . "\n";
            }
        }

        $messages = [
            ['role' => 'system', 'content' => $system],
        ];

        if ($contextText) {
            $messages[] = ['role' => 'system', 'content' => $contextText];
        }

        $messages[] = ['role' => 'user', 'content' => $userMessage];

        $response = $this->client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',     // económico; puedes cambiar luego
                'temperature' => 0.2,           // técnico y estable
                'messages' => $messages,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['choices'][0]['message']['content'] ?? '';
    }
}
