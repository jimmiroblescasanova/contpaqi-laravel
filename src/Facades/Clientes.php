<?php

namespace jimmirobles\ContpaqiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \jimmirobles\ContpaqiLaravel\ContpaqiLaravel
 */
class Clientes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \jimmirobles\ContpaqiLaravel\ClientesFacade::class;
    }
}
