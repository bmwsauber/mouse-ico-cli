#!/usr/bin/php
<?php
require __DIR__.'/vendor/autoload.php';

use App\MouseIco;

$app = new MouseIco();
try {
    $app->run();
} catch (Throwable $exception) {
    echo 'Error - ' . $exception->getMessage();
}


