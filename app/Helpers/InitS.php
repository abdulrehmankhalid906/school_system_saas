<?php

namespace App\Helpers;

use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;

class InitS{

    /*
    |--------------------------------------------------------------------------
    | Why we use self in php? (Important)
    |--------------------------------------------------------------------------
    |
    | In PHP, the self keyword is used to refer to the current class itself.
    | It is typically used to access static properties and methods within the same class.
    | In your code, self::timeZoneTime() is calling a static method named timeZoneTime that
    | is defined within the same class as the currentTime method.
    |
    */

    public static function getSchoolid()
    {
        return Auth::check() ? Auth::user()->school_id : 0;
    }

    public static function getGenders()
    {
        return ['Male','Female'];
    }

    public static function getRollNo($userid)
    {
        $year = now()->year;
        return 'AR-'.$year.$userid;
    }

    public static function getFeeMonth()
    {
        $currentTime = self::timeZoneTime();
        return $currentTime->format('m-Y');
    }

    public static function getSession()
    {
        $year = now()->year;
        return $year.'-'.$year+1;
    }

    public static function getdays()
    {
        return ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    }

    public static function payType()
    {
        return [
            [
                'type' => 'cash',
                'name' => 'Cash',
            ],
            [
                'type' => 'bank_transfer',
                'name' => 'Bank Transfer',
            ],
            [
                'type' => 'card',
                'name' => 'Card',
            ],
            [
                'type' => 'online',
                'name' => 'Online',
            ]
        ];
    }

    public static function currentTime()
    {
        $datetime = self::timeZoneTime();
        return $datetime->format('H:i:s');
    }

    public static function currentDate()
    {
        $datetime = self::timeZoneTime();
        return $datetime->format('Y-m-d');
    }

    public static function timeZoneTime()
    {
        return new \DateTime("now", new \DateTimeZone("Asia/Karachi"));
    }

    public static function uploadImage($image, $folder, $oldImage = null)
    {
        if ($oldImage) {
            $oldImagePath = public_path("uploads/{$folder}/{$oldImage}");
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("uploads/{$folder}"), $imageName);

        } else {
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/uploads/{$folder}";

            if (!file_exists($targetPath)) {
                mkdir($targetPath, 0777, true);
            }

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($targetPath, $imageName);
        }

        return $imageName;
    }

    public static function getImage($variable = null , $folder = null)
    {
       return $variable ? asset("/uploads/{$folder}/" .$variable) : asset('assets/img/avatars/1.jpg');
    }

    public static function generateCred($name)
    {
        do {
            $d = rand(1, 99999);
            $email = strtolower(str_replace(' ', '.', $name)) . $d . '@gmail.com';
            $user = User::where('email', $email)->first();
        } while ($user);

        return [
            'email' => $email,
            'password' => 12345678
        ];
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

    public static function showLog()
    {
        $message = 'We are happy to fix the issue';
        return $message;
    }
}
