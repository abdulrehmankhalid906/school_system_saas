<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\InitS;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function storeTeacherPermission(Request $request, $id)
    {
        try {
            $data = $request->all();

            $teacher = Teacher::whereHas('user', function ($query) {
                $query->where('school_id', InitS::getSchoolid());
            })->where('id', $id)->firstOrFail();

            $teacher->update([
                'is_attendance' => $data['is_attendance'],
                'is_marks' => $data['is_marks'],
            ]);

            return redirect()->back()->with('success', 'Permissions have been updated!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update permissions: ' . $e->getMessage()]);
        }
    }
}
