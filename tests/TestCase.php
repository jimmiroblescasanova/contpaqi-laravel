<?php

namespace jimmirobles\ContpaqiLaravel\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use jimmirobles\ContpaqiLaravel\ContpaqiLaravelServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'jimmirobles\\ContpaqiLaravel\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            ContpaqiLaravelServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_contpaqi-laravel_table.php.stub';
        $migration->up();
        */
    }
}
