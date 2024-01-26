<?php

require __DIR__ . '/vendor/autoload.php';

use Openexchange\Components\OpenExchangeDriver;

$driver = new OpenExchangeDriver();
$latest = $driver->getLatest();