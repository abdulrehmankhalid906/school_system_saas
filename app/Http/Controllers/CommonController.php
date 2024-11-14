<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\SchoolRequest;

class CommonController extends Controller
{
    public function basic_profile()
    {
        return view('profile.basic');
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

    public function basic_school()
    {
        return view('profile.basic_school',[
            'school' => School::where('user_id', Auth::id())->first()
        ]);
    }

    public function basic_school_update(SchoolRequest $request)
    {
        $school = School::where('user_id', Auth::id())->first();
    
        $school->update($request->validated());

        if ($request->hasFile('school_logo')) {
            $schoolLogo = $request->file('school_logo');
            $schoolLogoName = time() . '.' . $schoolLogo->getClientOriginalExtension();
            $schoolLogo->move(public_path('uploads/profile'), $schoolLogoName);
            $school->profile_image = $schoolLogoName;
            $school->save();
        }

        return redirect()->back()->with('success', 'School updated successfully');
    }
    // basic_school_update
}
