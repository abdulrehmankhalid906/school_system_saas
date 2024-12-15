<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Attendence;
use App\Models\Student;
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
        $attendence = Student::with(['user' => function($query) {
            $query->select('id','name');
        }])->where('klass_id', $request->class_id)->where('section_id', $request->section_id)->get();

        //dd($attendence);

        return response()->json([
            'message' => "No Data",
            'data' => $attendence
        ]);
    }

    public function submitAttendance(Request $request)
    {
        $attendanceData = $request->attendance;

        if (empty($attendanceData)) {
            return response()->json(['message' => 'No attendance data provided.'], 400);
        }

        foreach ($attendanceData as $attendance) {
            Attendence::create(
                [
                    'klass_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'user_id' => $attendance['user_id'],
                    'date' => $request->date,
                ],
                [
                    'status' => $attendance['status'],
                ]
            );
        }

        return response()->json(['message' => 'Attendance saved successfully.'], 200);
    }

    public function showAttendance(Request $request)
    {
        $attendance = Attendence::with('user')->where('klass_id', $request->class_id)->where('section_id',$request->section_id)->where('date', $request->attendence_date)->get();

        return response()->json([
            'message' => "Attendance Fetch Successfully!",
            'data' => $attendance
        ]);
    }
}
