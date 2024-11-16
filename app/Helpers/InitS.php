<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class InitS{

    public static function getSchoolid()
    {
        return Auth::check() ? Auth::user()->school_id : 0;
    }
}
