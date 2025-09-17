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

    public function chatHVAC(string $userMessage, array $context = []): string{
    // Mensaje del sistema: limita a HVAC y define negativa educada si es off-topic
    $system = [
        'role' => 'system',
        'content' => "Eres un asistente de soporte TÉCNICO especializado EXCLUSIVAMENTE en HVAC (calefacción, ventilación, aire acondicionado y refrigeración).
                      - Responde con precisión y concisión.
                      - Usa el historial previo como contexto para dar mejores respuestas.
                      - Si te preguntan algo fuera de HVAC, responde educadamente que no puedes ayudar en ese tema."
    ];

    // Construcción de messages
    $messages = [$system];

    // Inyecta contexto como historial real
    if (!empty($context)) {
        foreach ($context as $c) {
            $messages[] = [
                'role'    => $c['role'],    // 'user' o 'assistant'
                'content' => $c['content']
            ];
        }
    }

    // Agrega el mensaje actual del usuario
    $messages[] = ['role' => 'user', 'content' => $userMessage];

    $response = $this->client->post('chat/completions', [
        'json' => [
            'model'       => 'gpt-3.5-turbo',
            'temperature' => 0.2,
            'messages'    => $messages,
        ],
    ]);

    $data = json_decode($response->getBody(), true);
    return $data['choices'][0]['message']['content'] ?? '';
    }
}
