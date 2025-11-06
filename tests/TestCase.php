<?php

namespace Informate\Tests;

use Informate\InformateProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    protected function getPackageProviders($app)
    {
        return [
            InformateProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Enable all features for testing
        $app['config']->set('sitec.features', [
            'espolio' => true,
            'academy' => true,
            'social-relations' => true,
            'social-gostos' => true,
        ]);

        // Configure default models
        $app['config']->set('sitec.core.models', [
            'person' => \Informate\Tests\Fixtures\Person::class,
            'user' => \Informate\Tests\Fixtures\User::class,
            'business' => \Informate\Tests\Fixtures\Business::class,
        ]);
    }
}
