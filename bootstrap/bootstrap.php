<?php declare(strict_types=1);
$app = new \Greadog\Kernel\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);


return $app;