<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{
    public function basic_profile()
    {
        $user = User::with('school')->where('id', Auth::id())->first();
        return view('profile.basic',[
            'user' => $user,
        ]);
    }
}
