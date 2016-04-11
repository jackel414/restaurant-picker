<?php

namespace App\Yelp;

use Illuminate\Support\Facades\Facade;

class Yelp extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'yelp';
    }
}
