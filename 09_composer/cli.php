<?php

require 'vendor/autoload.php';
use Samee\Testing\MyApp;
// use GuzzleHttp\Client;

// $client = new Client();
// $response = $client->request('GET', 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd', ['verify' => false]);

// $data = json_decode($response->getBody());

// echo "Bitcoing price in USD: " . $data->bitcoin->usd . "\n";

$app = new MyApp();

$app->run();