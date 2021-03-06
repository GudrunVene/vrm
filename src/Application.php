<?php

namespace BookingApp;

use Silex\Application as SilexApplication;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

/**
 * Custom Application class that hold our application specifix functionality.
 */
class Application extends SilexApplication
{
    public function __construct(array $values = [])
    {
        parent::__construct($values);

        $this['debug'] = true;

        $this->register(new TwigServiceProvider(), [
            'twig.path' => __DIR__.'/../views',
        ]);

        // Database configuration
        $this->register(new DoctrineServiceProvider(), [
            'db.options' => [
                'driver' => 'pdo_sqlite',
                'path' => __DIR__.'/../database/app.db',
            ],
        ]);

        // Creating a table if it doesn't exist yet
        if (!$this['db']->getSchemaManager()->tablesExist('bookings')) {
            $this['db']->executeQuery("CREATE TABLE bookings (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstName VARCHAR(40) NOT NULL,
                lastName VARCHAR(40) NOT NULL,
                phone VARCHAR(10) NOT NULL,
                email VARCHAR(20) DEFAULT NULL,
                birthday DATE NOT NULL,
                startDate DATE NOT NULL,
                endDate DATE NOT NULL,
                arrivalTime TIME DEFAULT NULL,
                additionalInformation TEXT,
                nrOfPeople INT NOT NULL,
                payingMethod VARCHAR(10) NOT NULL
            );");
        }

        $this->get('/bookings/create', function () {
            return $this['twig']->render('base.html.twig');
        });
    }
}
