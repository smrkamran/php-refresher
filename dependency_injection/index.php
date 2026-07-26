<?php

require "vendor/autoload.php";

/*
$container = new Container;

$container->set(Database::class, function () {
    return new Database(
        host: "127.0.0.1",
        name: "product_db",
        user: "product_db_user",
        password: "secret"
    );
});

*/

$container = new DI\Container([
    Database::class => fn() =>
        new Database(
            host: "127.0.0.1",
            name: "product_db",
            user: "product_db_user",
            password: "secret"
        )
]);
$repository = $container->get(Repository::class);

$data = $repository->getAll();

print_r($data);