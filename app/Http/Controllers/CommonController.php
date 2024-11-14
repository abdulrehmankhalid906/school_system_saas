<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
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

    public function basic_profile_update(ProfileRequest $request)
    {
        $user = User::find(Auth::id());

        $user->update($request->validated());

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('uploads/profile'), $profileImageName);
            $user->profile_image = $profileImageName;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
