<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;
// localhost/hello otsitakse aadressi realt hello, kui leitakse siis näidatakse lehel
$app->get('/hello', function () {
    return 'Hello world!';
});
$app->run();
?>