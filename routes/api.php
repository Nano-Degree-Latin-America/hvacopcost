<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Http\Controllers\HvacChatController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php


Route::post('/chatgpt-support', function (Request $request) {
    $prompt = $request->input('message', 'Hola');

    $client = new Client([
        'base_uri' => 'https://api.openai.com/v1/',
        'headers' => [
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type'  => 'application/json',
        ],
    ]);


    /* 'Eres un asistente experto en soporte técnico de equipos HVAC. Solo puedes responder preguntas relacionadas con HVAC. Si la pregunta no es de HVAC, responde: "Lo siento, solo puedo responder preguntas sobre equipos HVAC" */

    try {
        $response = $client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    // Aquí forzamos el rol de soporte HVAC
                    /* ['role' => 'system', 'content' => 'Eres un asistente experto soporte para el en Análisis Energético y Financiero para Sistemas de HVAC. Si la pregunta no es de Análisis Energético y Financiero para Sistemas de HVAC, responde: "Lo siento, solo puedo responder preguntas sobre equipos HVAC.'], */
                    ['role' => 'user', 'content' => $prompt],
                ],
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return response()->json([
            'reply' => $data['choices'][0]['message']['content'] ?? 'No se recibió respuesta',
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
});


Route::post('/hvac/chat', [HvacChatController::class, 'chat'])
    ->middleware('throttle:30,1'); // rate limit básico: 30 req/min

