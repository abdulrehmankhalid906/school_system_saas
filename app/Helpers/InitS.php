<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class InitS{

    public static function getSchoolid()
    {
        return Auth::check() ? Auth::user()->school_id : 0;
    }

    public static function encodeId($id)
    {
        $salt = 13258769;
        return base64_encode(($id + $salt) . '-' . strrev($id));
    }

    public static function decodeId($encodedId)
    {
        try {
            $decoded = base64_decode($encodedId);
            list($modifiedId, $reversedId) = explode('-', $decoded);
            $originalId = intval(strrev($reversedId));
            $salt = 13258769;
            if ($originalId + $salt == intval($modifiedId)) {
                return $originalId;
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
