<?php

// Silex
$app = require __DIR__.'/../src/app.php';

if ($app['debug']) {
    return $app->run();
}

$app['http_cache']->run();
