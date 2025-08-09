<?php

namespace Doriiaan\FilamentAstrotomic\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Doriiaan\FilamentAstrotomic\FilamentAstrotomic
 */
class FilamentAstrotomic extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Doriiaan\FilamentAstrotomic\FilamentAstrotomic::class;
    }
}
