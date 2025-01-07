<?php

namespace App\Http\Controllers;

use App\Helpers\InitS;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::where('school_id', InitS::getSchoolid())->get();

        return view('exams.index', [
            'exams' => $exams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $exam = Exam::where('school_id', InitS::getSchoolid())->firstOrFail();
        // return view('exams.add_edit',[
        //     'exam' => $exam
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Exam::create($request->all());

        // return redirect()->back()->with('success', 'Exam has been created!');
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

    public function addEditExam(Request $request)
    {
        dd($request->all());
    }
}
