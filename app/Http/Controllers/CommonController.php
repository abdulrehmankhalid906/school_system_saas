<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\School;
use App\Models\FeeType;
use App\Models\ClassFee;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;

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

    public function basic_school()
    {
        return view('profile.basic_school',[
            'school' => School::with('classfee.klass')->where('id', Auth::user()->school_id)->first()
        ]);
    }

    public function basic_school_update(SchoolRequest $request)
    {
        $school = School::where('id', Auth::user()->school_id)->first();

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

    public function manage_school_fee(Request $request)
    {
        $ids = $request->ids;
        $fees = $request->fees;

        if (!is_array($ids) || !is_array($fees) || count($ids) !== count($fees))
        {
            return redirect()->back()->with('error', 'Invalid input: IDs and fees must be arrays of the same length.');
        }

        foreach ($ids as $index => $id) {
            $classfee = ClassFee::where('id', $id)->where('school_id', InitS::getSchoolid())->first();

            if ($classfee) {
                $classfee->class_fee = $fees[$index];
                $classfee->save();
            } else {
                return redirect()->back()->with('error', "ClassFee record not found for ID: $id");
            }
        }

        return redirect('school')->back()->with('success', 'The fees have been updated successfully.');
    }

    // public function feeTypes()
    // {
    //     return view('fees.feetype',[
    //         'feetypes' => FeeType::get()
    //     ]);
    // }
    // basic_school_update
}
