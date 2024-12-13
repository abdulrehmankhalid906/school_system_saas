<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Attendence;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function index()
    {
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();
        return view('attendence.index',[
            'classes' => $classes
        ]);
    }

    public function getAttendenceStudent(Request $request)
    {
        $attendence = Attendence::with(['user' => function($query) {
            $query->select('id','name');
        }])->where('klass_id', $request->class_id)->where('section_id', $request->section_id)->get();

        return response()->json([
            'message' => "No Data",
            'data' => $attendence
        ]);
    }
}
