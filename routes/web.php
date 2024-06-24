<?php

use Illuminate\Support\Facades\Route;

Route::domain('{webhookAlias}.' . env('APP_URL'))->group(function () {
    Route::get('', function ($webhookAlias) {
        return response()->json(['message' => "Webhook $webhookAlias received!"]);
    });
});

Route::match([
    'get',
    'post',
    'put',
    'patch',
    'delete',
],
'/teste/{webhookAlias}', [\App\Http\Controllers\WebhookController::class, 'processPayload']);

Route::get('/', \App\Livewire\Main::class);

Route::get('/teste', \App\Livewire\Teste::class);

Route::get('/socket/{message}', function ($message) {
    \App\Events\SocketTeste::dispatch($message);
    return response()->json(['message' => 'Hello World!']);
});



