<?php

use Illuminate\Support\Facades\Route;

Route::get('/thrones-of-hooks', \App\Livewire\Main::class);

Route::domain('{webhookAlias}.' . env('APP_URL'))->group(function () {
    Route::match([
        'get',
        'post',
        'put',
        'patch',
        'delete',
    ], '/{path?}', [\App\Http\Controllers\WebhookController::class, 'processPayload'])->where('path', '.+');
});

Route::match([
    'get',
    'post',
    'put',
    'patch',
    'delete',
],
'/teste/{webhookAlias}/{path?}', [\App\Http\Controllers\WebhookController::class, 'processPayload'])->where('path', '.+');

Route::get('/', function () {
    return response()->json([
        'This homepage is in construction!',
    ]);
});



