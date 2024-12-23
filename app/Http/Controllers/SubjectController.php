<?php

namespace App\Http\Controllers;

use App\Helpers\InitS;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Imports\SubjectsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('subjects.subjects',[
            'subjects' => Subject::where('school_id', InitS::getSchoolid())->get(),
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
    public function store(StoreSubjectRequest $request)
    {
        $subject = $request->validated();
        $subject['school_id'] = InitS::getSchoolid();

        Subject::create($subject);

        return redirect()->back()->with('success', 'Subject has been created!');
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
        $subject = Subject::where('id', $id)->where('school_id', InitS::getSchoolid())->firstOrFail();
        return response()->json([
            'status' => 200,
            'data' => $subject
        ]);
    }

    public function update(UpdateSubjectRequest $request, string $id)
    {
        $subject = Subject::where('id', $id)->where('school_id', InitS::getSchoolid())->firstOrFail();

        $subject->update($request->validated());

        return redirect()->back()->with('success','Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subject = Subject::where('school_id', InitS::getSchoolid())->findOrFail($id);

            $subject->delete();
            return response()->json(['message' => 'The Subject has been removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }

    public function bulkImportSubject(Request $request)
    {
        try
        {
            $request->validate([
                'bulk_upload_file' => ['required','file'],
            ]);

            Excel::import(new SubjectsImport, $request->file('bulk_upload_file'));

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
}
