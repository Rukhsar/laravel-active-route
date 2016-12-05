<?php

namespace Rukhsar\ActiveRoute\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Active facade class
 *
 * @package Rukhsar\ActiveRoute
 */

class Active extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'active';
    }
}
