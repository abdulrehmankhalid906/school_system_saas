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

function encodeId($id)
{
    $salt = '1X2V03R41T5WQA';
    return base64_encode(($id + $salt) . '-' . strrev($id));
}

function decodeId($encodedId)
{
    try {
        $decoded = base64_decode($encodedId);
        list($modifiedId, $reversedId) = explode('-', $decoded);
        $originalId = intval(strrev($reversedId));
        $salt = '1X2V03R41T5WQA';
        if ($originalId + $salt == intval($modifiedId)) {
            return $originalId;
        }
        return null; // Invalid encoding
    } catch (\Exception $e) {
        return null; // Handle invalid encoding
    }
}