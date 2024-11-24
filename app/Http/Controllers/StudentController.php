<?php

namespace App\Http\Controllers;

use App\Helpers\InitS;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('students.index',[
        //     'students' => Student::where('')->get(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.basic_student');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['address']),
            'address' => $data['password'],
            'school_id' => InitS::getSchoolid(),
        ];

        $Auser = User::create($user);
        $Auser->syncRoles('Student');

        $student = [
            'user_id' => $Auser->id,
            'klass_id' => $data['klass_id'],
            'section_id' => $data['section_id'],
            'date_of_birth' => $data['date_of_birth'],
            'enrollment_date' => $data['enrollment_date'],
            'session' => $data['session']
        ];

        Student::create($student);

        return redirect()->back()->with('success','The Student has been created');
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
}
