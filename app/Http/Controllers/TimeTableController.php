<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeTables = TimeTable::with(['klass','section'])->where('school_id', InitS::getSchoolid())->get();

        return view('timetables.index',[
            'timeTables' => $timeTables
        ]);

        // dump($timeTables);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::whereHas('user', function($query){
            $query->where('school_id',InitS::getSchoolid());
        })->get();

        $subjects = Subject::where('school_id', InitS::getSchoolid())->select('id', 'course_name')->get();
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();
        return view('timetables.add',[
            'classes' => $classes,
            'teachers' => $teachers,
            'subjects' => $subjects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Timetable::create([
            'title' => $request->title,
            'klass_id' => $request->klass_id,
            'section_id' => $request->section_id,
            'time_table' => json_encode($request->timetable),
            'school_id' => InitS::getSchoolid()
        ]);

        return redirect()->route('timetables.index')->with('success', 'Timetable saved successfully!');
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
        $timeTables = TimeTable::where('school_id', InitS::getSchoolid())->findOrFail($id);
        $teachers = Teacher::whereHas('user', function($query){
            $query->where('school_id',InitS::getSchoolid());
        })->get();

        $subjects = Subject::where('school_id', InitS::getSchoolid())->select('id', 'course_name')->get();
        $sections = Section::where('klass_id', $timeTables->klass_id)->select('id', 'name')->get();
        $classes = Klass::where('school_id', InitS::getSchoolid())->select('id', 'name')->get();

        return view('timetables.edit',[
            'classes' => $classes,
            'teachers' => $teachers,
            'subjects' => $subjects,
            'sections' => $sections,
            'timeTables' => $timeTables
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $timeTables = TimeTable::where('school_id', InitS::getSchoolid())->findOrFail($id);
        $timeTables->update([
            'title' => $request->title,
            'klass_id' => $request->klass_id,
            'section_id' => $request->section_id,
            'time_table' => json_encode($request->timetable),
            'school_id' => InitS::getSchoolid()
        ]);

        return redirect()->route('timetables.index')->with('success', 'Timetable updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $timeTable = TimeTable::where('school_id', InitS::getSchoolid())->findOrFail($id);

            $timeTable->delete();
            return response()->json(['message' => 'Timetable has been removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }
}
