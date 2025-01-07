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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->id) {
            $exam = Exam::where('id', $request->id)->where('school_id',InitS::getSchoolid())->firstOrFail();
            $exam->update($data);
            $message = 'Exam has been updated!';
        } else {
            $data['school_id'] = InitS::getSchoolid();
            Exam::create($data);
            $message = 'Exam has been created!';
        }

        return redirect()->route('exams.index')->with('success', $message);
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

    public function addEditExam($id = null)
    {
        $exam = Exam::where('id', $id)->where('school_id',InitS::getSchoolid())->first();
        return view('exams.add_edit',[
            'exam' => $exam
        ]);
    }
}
