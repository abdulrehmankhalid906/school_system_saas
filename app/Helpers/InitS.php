<?php

namespace App\Helpers;

use App\Models\School;
use Illuminate\Support\Facades\Auth;

class InitS{

    public static function getSchoolid()
    {
        return Auth::user() ? Auth::user()->school_id : 0;
    }
}
