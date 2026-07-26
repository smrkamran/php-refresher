<?php

require __DIR__."/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$envVars = $dotenv->load();
print_r($envVars);

// $mysqli = new mysqli($config["database"]["hostname"], $config["database"]["username"], $config["database"]["password"], $config["database"]["name"]);
