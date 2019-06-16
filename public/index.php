<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . "/../bootstrap/bootstrap.php";


$http = new \Swoole\Http\Server("127.0.0.1", 9501);

$router = new League\Route\Router;
$router->map('GET', '/', function (ServerRequestInterface $request) {
    return 111;
});
$http->on('request', function ($request, $response) use ($router) {
    $server = \FastD\Http\SwooleServerRequest::createServerRequestFromSwoole($request);
    $response = $router->dispatch($server);

    var_dump($response);
});
$http->start();