<?php

namespace App\Helpers;

use App\Models\School;
use Illuminate\Support\Facades\Auth;

class InitS{

    public static function getSchoolid()
    {
        return School::where('user_id',Auth::id())->pluck('id')->first();
    }
}
