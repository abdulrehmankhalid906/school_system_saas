<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\TeacherAttendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')
            ->whereHas('user', function ($query) {
                $query->role('Teacher')->where('school_id', InitS::getSchoolid());
            })
            ->get();

        return view('teachers.teachers', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();

            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'school_id' => InitS::getSchoolid(),
            ];

            $Auser = User::create($user);
            $Auser->syncRoles('Teacher');

            $teacher = [
                'user_id' => $Auser->id,
                'join_date' => now(),
            ];

            Teacher::create($teacher);

            DB::commit();

            return redirect()->back()->with('success', 'The Teacher has been created');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to create teacher: ' . $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function mangeTeacherPermission(Request $request, $id)
    {
        $teacher = Teacher::whereHas('user', function ($query) {
            $query->where('school_id', InitS::getSchoolid());
        })->where('id', $id)->firstOrFail();

        return response()->json([
            'status' => 200,
            'data' => $teacher
        ]);
    }


    public function storeTeacherPermission(Request $request)
    {
        try {
            $data = $request->all();

            $teacher = Teacher::whereHas('user', function ($query) {
                $query->where('school_id', InitS::getSchoolid());
            })->where('id', $data['id'])->firstOrFail();

            // Update the teacher's permissions
            $teacher->update([
                'is_attendance' => isset($data['is_attendance']),
                'is_mark' => isset($data['is_mark']),
            ]);

            return redirect()->back()->with('success', 'Permissions have been updated!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update permissions: ' . $e->getMessage()]);
        }
    }

    public function getTeacherAttendance(Request $request)
    {
        $teachers = Teacher::with('user')->whereHas('user', function ($query) {
            $query->where('school_id', InitS::getSchoolid());
        })->get();

        $teacherAttendance = TeacherAttendance::with('teacher.user');

        if($request->has('teacher_id') && !empty($request->teacher_id))
        {
            $teacherAttendance->where('teacher_id', $request->teacher_id);
        }

        if ($request->has('month') && !empty($request->month)) {
            $year = substr($request->month, 0, 4);
            $month = substr($request->month, 5, 2);

            $teacherAttendance->whereYear('date', $year)->whereMonth('date', $month);
        }

        $attendances = $teacherAttendance->orderBy('id','DESC')->get();

        return view('teachers.attendance-report', [
            'teachers' => $teachers,
            'attendances' => $attendances
        ]);
    }


    public function markTeacherAttendance(Request $request)
    {
        $teacherid = Auth::user()->teacher->id;
        $attendance = TeacherAttendance::where('teacher_id', $teacherid)->where('date', InitS::currentDate())->first();

        //Check In
        if ($request->type == 'check_in') {

            if (!$attendance) {
                TeacherAttendance::create([
                    'teacher_id' => $teacherid,
                    'date' => InitS::currentDate(),
                    'check_in' => InitS::currentTime(),
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'You have checked in successfully'
                ]);
            } else {

                return response()->json([
                    'status' => false,
                    'message' => 'You have already checked in today'
                ]);
            }
        }

        //Check Out
        else if ($request->type == 'check_out') {

            if (!$attendance || !$attendance->check_in) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have not checked in yet'
                ]);
            }

            if ($attendance->check_out) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have already checked out today'
                ]);
            }

            $attendance->update([
                'check_out' => InitS::currentTime(),
                'remarks' => $this->calculateAttendanceTime($attendance->check_in, InitS::currentTime()),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'You have checked out successfully'
            ]);
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid request'
            ]);
        }
    }

    function calculateAttendanceTime($checkIn, $checkOut)
    {
        $checkIn = strtotime($checkIn);
        $checkOut = strtotime($checkOut);

        $diff = $checkOut - $checkIn;

        $hours = floor($diff / (60 * 60));
        $minutes = floor(($diff - $hours * (60 * 60)) / 60);
        $seconds = $diff % 60;

        return $hours . ' hours ' . $minutes . ' minutes ' . $seconds . ' seconds';
    }
}
