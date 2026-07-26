<?php
declare(strict_types=1);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

require "vendor/autoload.php";


$router = new RouteCollector;

$router->get("/", function () {
    return "This is the Homepage";
});
$router->get("/products/{id:\d+}", function ($id) {
    return "This is the Products page. Product Id: {$id}";
});

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], $path);
echo $response;

/*
require "Router.php";

$router = new Router();

$router->add("/", function () {
    echo "This is the homepage";
});
$router->add("/about", function () {
    echo "This is the about page";
});
$router->add("/contact", function () {
    echo "This is the contact page";
});

$router->add("/products/{id}", function ($id) {
    echo "This is the products page: {$id}";
});
$router->add("/products/{id}/orders/{order_id}", function ($id, $order_id) {
    echo "This is the products page: {$id}, OrderId is: {$order_id}";
});

$router->dispatch($path);
*/

// switch ($path) {
//     case "/":
//         echo "This is the homepage";
//         break;
//     case "/about":
//         echo "This is the about page";
//         break;
//     case "/contact":
//         echo "This is the contact page";
//         break;
//     default:
//         echo "Page not found";
// }
