<?php

use Illuminate\Support\Facades\Auth;

//learning purpose.. 
/*
If we have static funcion we don't create the object of the function
like public static function checkValue()
*/

function validate_user_permission($permission)
{
    $user = Auth::user();
    // dd($user->can($permission));

    if ($user && $user->can($permission)) {
        return true;
    }
    return abort(403, 'Unauthorized action.');
}


function setRoute($route)
{
    return request()->routeIs($route) ? 'active' : '';
}

function packages()
{
    return ['Free 2 Months','15 Jobs Post','05 Jobs Boosters','API Integrations','Custom Interface Option','Invoice Module','Live Chat Support'];
}

function EncryptId($id)
{
    $baseEnc = 'X6UT0MMM1PWSW7';
    $digitEnc = ($id + 25 - 2 + $id);
    $middleEnc = $baseEnc . 'T' . $digitEnc;
    return $middleEnc;
}

function DecryptId($hash)
{
    $baseEnc = 'X6UT0MMM1PWSW7';
    $prefixLength = strlen($baseEnc) + 1;
    $digitEnc = substr($hash, $prefixLength);

    $id = ($digitEnc - 25 + 2) / 2;
    return $id;
}