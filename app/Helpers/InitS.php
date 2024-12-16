<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class InitS{

    public static function getSchoolid()
    {
        return Auth::check() ? Auth::user()->school_id : 0;
    }

    public static function getGenders()
    {
        return ['Male','Female'];
    }

    public static function getFeeMonth()
    {
        $currentTime = new \DateTime();
        return $currentTime->format('m-Y');
    }

    public static function getSession()
    {
        $year = now()->year;
        return $year.'-'.$year+1;
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

    // public static function hash($id)
    // {
    //     $date = date('dMY').'CJ';
    //     $hash = new Hashids($date, 14);
    //     return $hash->encode($id);
    // }

    // public static function decodeHash($str, $toString = true)
    // {
    //     $date = date('dMY').'CJ';
    //     $hash = new Hashids($date, 14);
    //     $decoded = $hash->decode($str);
    //     return $toString ? implode(',', $decoded) : $decoded;
    // }
}
