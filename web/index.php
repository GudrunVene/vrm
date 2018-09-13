<?php

require_once __DIR__.'/../vendor/autoload.php';

//pöördub loodud klassi poole ja loeb vajalikuid asjad
use BookingApp\Application;

//tekitame uue aplikatsiooni
$app = new Application();

$app->run();
?>