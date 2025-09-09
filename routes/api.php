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

Route::post('/hvac/chat', [HvacChatController::class, 'chat'])
    ->middleware('throttle:30,1'); // rate limit básico: 30 req/min

Route::post('/text-to-voice', function (Request $request) {
    $text = $request->input('text', 'Hola, soy tu asistente HVAC');

    $client = new Client();
    $response = $client->post('https://api.openai.com/v1/audio/speech', [
        'headers' => [
            'Authorization' => 'Bearer ' . config('services.openai.key'),
        ],
        'json' => [
            'model' => 'gpt-4o-mini-tts',
            'voice' => 'nova', // 👩 voz femenina
            'input' => $text,
        ],
    ]);

    $audioContent = $response->getBody()->getContents();

    $filename = 'voice_' . uniqid() . '.mp3';
    Storage::disk('public')->put("voices/$filename", $audioContent);

    // Retornas la URL al frontend
    return response()->json([
        'audio_url' => asset("storage/voices/$filename")
    ]);
});
