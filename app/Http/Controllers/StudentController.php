<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentUserImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreStudentRequest;
use Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['user','klass','section'])->whereHas('user', function($query){
            $query->where('school_id', InitS::getSchoolid());
        })->get();

        return view('students.index',[
            'students' => $students,
            'classes' => Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get(),
        ]);
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
                //'parent_id' => $data['parent_id'],
                'klass_id' => $data['klass_id'],
                'section_id' => $data['section_id'],
                'monthly_fee' => $data['monthly_fee'],
                'date_of_birth' => $data['date_of_birth'],
                'gender' => $data['gender'],
                'enrollment_date' => now(),
                'session' => InitS::getSession(),
                'roll_no' => InitS::getRollNo($Auser->id),
            ];

            Student::create($student);

            DB::commit();

            return redirect()->back()->with('success', 'The Student has been created');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to create student: ' . $e->getMessage()]);
        }
    }

    public function bulkImportStudent(Request $request)
    {
        try
        {
            $data = $request->validate([
                'bulk_upload_file' => 'required|mimes:xlsx,xls,csv',
                'klass_id' => 'required|exists:klasses,id',
                'section_id' => 'required|exists:sections,id',
            ]);

            Excel::import(new StudentUserImport($data['klass_id'], $data['section_id']), $request->file('bulk_upload_file'));
            return redirect()->back()->with('success','File uploaded successfully');

        }
        catch(Exception $ex)
        {
            return response()->json([
                'message' => 'An error occurred during file upload',
                'error' => $ex->getMessage(),
            ], 500);
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
        $student = Student::with(['user','klass','section','parent'])->whereHas('user', function($query){
            $query->where('school_id', InitS::getSchoolid());
        })->where('id', $id)->firstOrFail();
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();
        $sections = Section::where('klass_id', $student->klass_id)->whereHas('klass', function($query){
            $query->where('school_id', InitS::getSchoolid());
        })->select('id', 'name')->get();

        return view('students.edit',[
            'student' => $student,
            'classes' => $classes,
            'sections' => $sections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'address' => 'nullable|string',
                'phone' => 'nullable|string',
                'klass_id' => 'required|exists:klasses,id',
                'section_id' => 'required|exists:sections,id',
                'date_of_birth' => 'required|date',
                'monthly_fee' => 'required|numeric',
            ], [
                'klass_id.exists' => 'Please select a valid class.',
                'section_id.exists' => 'Please select a valid section.',
            ]);

            $student = Student::with('user')->whereHas('user', function($query){
                $query->where('school_id', InitS::getSchoolid());
            })->where('id', $id)->firstOrFail();

            $student->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'address' => $data['address'] ?? NULL,
                'phone' => $data['phone'] ?? NULL,
            ]);

            $student->update([
                'klass_id' => $data['klass_id'],
                'section_id' => $data['section_id'],
                'monthly_fee' => $data['monthly_fee'],
                'date_of_birth' => $data['date_of_birth'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'The Student has been updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Failed to update student: ' . $e->getMessage()]);
        }
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

    public function getStudents(Request $request)
    {
        $ress = Student::with('user')->whereHas('user', function($query){
            $query->where('school_id', InitS::getSchoolid());
        })->where('section_id', $request->sectionId)->get();

        return response()->json([
            'status' => 200,
            'data' => $ress
        ]);
    }
}
