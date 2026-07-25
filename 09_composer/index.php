<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
$response = $client->request('GET', 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd', ['verify' => false]);

$data = json_decode($response->getBody());



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bitcoin Price: $<?php echo $data->bitcoin->usd; ?></h1>
</body>

</html>