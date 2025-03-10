<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

class CommonController extends Controller
{
    public function basicDetails()
    {
        return view('profile.basic');
    }

    public function updateBasicDetails(ProfileRequest $request)
    {
        $user = User::find(Auth::id());

        $user->update($request->validated());

        if ($request->hasFile('profile_img'))
        {
            $profileImage = $request->file('profile_img');
            $profileImageName = InitS::uploadImage($profileImage, 'profile', $user->profile_image); //User Profile = Profile Folder
            $user->profile_image = $profileImageName;
            $user->save();
        }
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function basicSchoolDetails()
    {
        return view('profile.basic_school',[
            'school' => School::where('id', Auth::user()->school_id)->first()
        ]);
    }

    public function updateSchoolDetails(SchoolRequest $request)
    {
        $school = School::where('id', Auth::user()->school_id)->first();

        $school->update($request->validated());

        if ($request->hasFile('logo')) {
            $schoolLogo = $request->file('logo');
            $profileImageName = InitS::uploadImage($schoolLogo, 'logo', $school->logo);  //school logo = Logo Folder
            $school->logo = $profileImageName;
            $school->save();
        }

        return redirect()->back()->with('success', 'School updated successfully');
    }

}
