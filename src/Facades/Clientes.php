<?php

namespace jimmirobles\ContpaqiLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use jimmirobles\ContpaqiLaravel\ClientesFacade;

/**
 * @see ClientesFacade
 */
class Clientes extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClientesFacade::class;
    }
}
