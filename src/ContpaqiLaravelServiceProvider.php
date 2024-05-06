<?php

namespace jimmirobles\ContpaqiLaravel;

use Illuminate\Support\Facades\Config;
use Spatie\LaravelPackageTools\Package;
use Illuminate\Database\Eloquent\Relations\Relation;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use jimmirobles\ContpaqiLaravel\Commands\ContpaqiLaravelCommand;

class ContpaqiLaravelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('contpaqi-laravel')
            ->hasConfigFile()
            // ->hasViews()
            // ->hasMigration('create_contpaqi-laravel_table')
            ->hasCommand(ContpaqiLaravelCommand::class);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/contpaqi.php' => config_path('contpaqi.php'),
            ], 'contpaqi-config');
        }

        $this->setConnection();

        // Define la relacion polimorfica de las direcciones
        Relation::morphMap([
            '1' => 'jimmirobles\ContpaqiLaravel\Models\admClientes',
            '3' => 'jimmirobles\ContpaqiLaravel\Models\admDocumentos',
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/contpaqi.php', 'contpaqi');
    }

    /**
     * Define la conexion primaria para los modelos
     *
     * @return void
     */
    public function setConnection()
    {
        $connection = Config::get('contpaqi.default');

        if ($connection !== 'default') {
            $wardrobeConfig = Config::get('contpaqi.connections.' . $connection);
        } else {
            $connection = Config::get('database.default');
            $wardrobeConfig = Config::get('database.connections.' . $connection);
        }

        Config::set('database.connections.contpaqi', $wardrobeConfig);
    }
}
