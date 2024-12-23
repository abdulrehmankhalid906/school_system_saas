<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreStudentRequest;

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

    function classAndParents()
    {
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();
        $parents = User::role('Parent')->where('school_id', InitS::getSchoolid())->select('id', 'name')->get();

        return [
            'classes' => $classes,
            'parents' => $parents
        ];
    }
    public function create()
    {
        return view('students.basic_student',[
            'data' => $this->classAndParents(),
        ]);
    }


    public function studentBulk()
    {
        return view('students.bulk_student',[
            'data' => $this->classAndParents(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            $user = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'address' => $data['address'],
                'phone' => $data['phone'],
                'school_id' => InitS::getSchoolid(),
            ];

            $Auser = User::create($user);
            $Auser->syncRoles('Student');

            $student = [
                'user_id' => $Auser->id,
                'parent_id' => $data['parent_id'],
                'klass_id' => $data['klass_id'],
                'section_id' => $data['section_id'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'enrollment_date' => now(),
                'session' => InitS::getSession(),
            ];

            Student::create($student);

            DB::commit();

            return redirect()->back()->with('success', 'The Student has been created');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to create student: ' . $e->getMessage()]);
        }
    }

    public function storeBulkStudents(Request $request)
    {
        dd($request->all());
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

    public function getSections(Request $request)
    {
        $resp = Section::where('klass_id', $request->class_id)->get();
        return response()->json([
            'status' => 200,
            'data' => $resp
        ]);
    }
}
