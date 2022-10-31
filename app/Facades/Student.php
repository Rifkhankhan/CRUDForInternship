<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Student extends Facade{
    protected static function getFacadeAccessor()
    {
        return 'student';
    }
}