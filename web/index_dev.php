<?php

ini_set('display_errors', 1);
error_reporting(-1);

// Silex
$env = "dev";
require __DIR__.'/../src/SilexMarkdown/app.php';

// php -S localhost:8080 -t web web/index.php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
        return false;
}

$app->run();
