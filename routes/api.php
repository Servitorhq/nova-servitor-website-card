<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('/servitor/monitor', function (Request $request) {
    $monitorId = $request->get('monitorId');

    $client = new \GuzzleHttp\Client();
    $result = $client->request('GET', 'https://servitor.io/api/v1/monitors/' . $monitorId, [
        'headers'   => [
            'Authorization' => config('services.nova_servitor_cards.api_key'),
        ]
    ])->getBody()->getContents();
    $result = json_decode($result, true);

    return response()
        ->json($result);
});