<?php

namespace Radoan\Memail\Facades;

use Illuminate\Support\Facades\Facade;

class Memail extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'Radoan\Memail';
    }

}
