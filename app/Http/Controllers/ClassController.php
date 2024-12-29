<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateClassRequest;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('classes.classes', [
            'classes' => Klass::with(['sections' => function($query) {
                $query->pluck('name','klass_id');
            }])
            ->where('school_id', InitS::getSchoolid())->get(),
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
    public function store(StoreClassRequest $request)
    {
        Klass::create(array_merge($request->validated(),['school_id' => InitS::getSchoolid()]));

        return redirect()->back()->with('success', 'Class has been created!');
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
        $class = Klass::where('id', $id)->where('school_id', InitS::getSchoolid())->firstOrFail();
        // dd($class);

        return response()->json([
            'status' => 200,
            'data' => $class
        ]);

        //dd($class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassRequest $request, string $id)
    {
        $class = Klass::where('id', $id)->where('school_id', InitS::getSchoolid())->firstOrFail();

        $class->update($request->validated());

        return redirect()->back()->with('success','Class updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $class = Klass::with('sections')->where('school_id', InitS::getSchoolid())->findOrFail($id);

            $class->sections()->delete();

            $class->delete();

            return response()->json(['message' => 'The Class has been removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage(),
            ], 500);
        }
    }

    public function manageSection(string $class_id, $section_id = null)
    {
        $classes = Klass::with('sections')->where('id',$class_id)->where('school_id', InitS::getSchoolid())->firstOrFail();
        $getsection = $section_id ? Section::find($section_id) : null;

        return view('classes.manage-sections', [
            'classes' => $classes,
            'getsection' => $getsection,
        ]);
    }

    public function Sectionmanage(Request $request)
    {
        // Validate the input data
        $request->validate([
            'class_id' => 'required|exists:klasses,id',
            'section' => 'required|string|max:255',
        ]);

        // Update or create the section
        $section = Section::updateOrCreate(
            [
                'klass_id' => $request->class_id,
                'id' => $request->section_id,
            ],
            [
                'name' => $request->section,
            ]
        );

        $message = $section->wasRecentlyCreated
            ? 'The Section has been created!'
            : 'The Section has been updated!';

        return redirect()->back()->with('success', $message);
    }
}
