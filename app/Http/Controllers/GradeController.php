<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Helpers\InitS;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grades.index',[
            'grades' => Grade::where('school_id', InitS::getSchoolid())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['school_id'] = InitS::getSchoolid();
        $data['range'] = $this->gradeConversation('convert', $request->start_range, $request->end_range);
        Grade::create($data);

        return redirect()->route('grades.index')->with('success', 'Grade has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // A 80 - 100
        // B 65 - 80
        // C 50 - 65
        // D 35 -50
        // F 0 - 35
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::where('school_id', InitS::getSchoolid())->findOrFail($id);
        $range = $this->gradeConversation('decompose',false, false, $grade->range);
        // $range = $this->gradeConversation(type: 'decompose', range: $grade->range);  //This is also good
        return view('grades.edit',[
            'grade' => $grade,
            'range' => $range
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $grade = Grade::where('school_id', InitS::getSchoolid())->findOrFail($id);

        $combineData = $this->gradeConversation('convert', $request->start_range, $request->end_range);

        $grade->update([
            'title' => $request->title,
            'range' => $combineData
        ]);

        return redirect()->route('grades.index')->with('success', 'The Grade has been updated');
        // return redirect()->route('grades.index')->with('success', 'Grade has been added!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $grade = Grade::where('school_id', InitS::getSchoolid())->findOrFail($id);
            $grade->delete();

            return response()->json(['message' => 'The Grade has been removed!']);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage(),
            ], 500);
        }
    }


    public function gradeConversation($type = 'convert', $start = false, $end = false, $range = false)
    {
        if($type === 'convert')
        {
            return $start . '-' . $end;
        }
        else
        {
            $parts = explode("-", $range);
            $before = trim($parts[0]);
            $after = trim($parts[1]);

            return [
               'before' =>  $before,
               'after' => $after
            ];
        }
    }
}
