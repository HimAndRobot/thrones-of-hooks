<?php

namespace App\Http\Controllers;

use App\Events\SocketTeste;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function processPayload(Request $request, $webhookAlias)
    {
        if (!\App\Models\Webhook::where('alias', $webhookAlias)->exists()) {
            return response()->json(['message' => 'Webhook not found!'], 404);
        }

        $payload = $request->all();
        $headers = $request->header();
        $userAgent = $request->userAgent();
        $ip = $request->ip();
        $platform = $request->header('Platform');
        $method = $request->method();
        $webhookId = \App\Models\Webhook::where('alias', $webhookAlias)->first()->id;

        $webhookPayload = new \App\Models\WebhookPayload();
        $webhookPayload->webhook_id = $webhookId;
        $webhookPayload->payload = json_encode($payload);
        $webhookPayload->headers = json_encode($headers);
        $webhookPayload->user_agent = $userAgent;
        $webhookPayload->ip = $ip;
        $webhookPayload->platform = $platform;
        $webhookPayload->method = $method;
        $webhookPayload->save();

        \App\Events\SocketTeste::dispatch($webhookId);

        return response()->json(['message' => 'Payload received!']);
    }
}
