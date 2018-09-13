<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;
// localhost/hello otsitakse aadressi realt hello, kui leitakse siis näidatakse lehel...
$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__.'/../views',
]);

$app->get('/bookings/create', function () use ($app) {
    return $app['twig']->render('base.html.twig'); // tuleb lugeda fail base.html.twig
});

$app->run();
?>