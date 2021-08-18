<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {

    /**
     * служебные данные
     */
    $apiKey = 'QlnRWTTWw9lv3kjxy1A8byjUmBQedYqb';
    $contentType = 'application/x-www-form-urlencoded';
    $url = 'https://superposuda.retailcrm.ru/api/v5/orders/create';

    /**
     * данные заказа
     */
    $order = [
        'status' => 'trouble',
        'orderType' => 'fizik',
        'orderMethod' => 'test',
        'number' => '10.07.1998',
        'firstName' => 'Staroverov',
        'lastName' => 'Andrey',
        'patronymic' => 'Yurievich',
        'customFields' => [
            array(
                'prim' => 'тестовое задание'
            )
        ],
        'payments' => [
            array(
                'type' => 'cash',
                'comment' => 'ссылка на код'
            )
        ],
        'items' => [
            array(
                '' => [
                    'offer' => [
                        'article' => 'AZ105R'
                    ],
                    'productName' => 'Маникюрный набор AZ105R Azalita',
                ]
            )
        ],
        'company' => [
            'brand' => 'Azalita'
        ]
    ];

    $client = new GuzzleHttp\Client();
    $response = $client->post($url, [
        'body' => 'site=test&order=' . json_encode($order),
        'headers' => [
            'Content-Type' => $contentType,
            'X-API-KEY' => $apiKey
        ]
    ]);
    dd($response);
});
