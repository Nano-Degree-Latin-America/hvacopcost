<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
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

    try {
        $response = $client->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    // Aquí forzamos el rol de soporte HVAC
                    ['role' => 'system', 'content' => 'Eres un asistente experto en Análisis Energético y Financiero para Sistemas de HVAC. Solo puedes responder preguntas relacionadas con Análisis Energético y Financiero para Sistemas de HVAC .'],
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
