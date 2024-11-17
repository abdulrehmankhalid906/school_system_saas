<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\StoreSubjectRequest;

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

    public function manageSection(Request $request)
    {
        $sections = $request->section;

        foreach($sections as $section)
        {
            Section::create([
                'klass_id' => $request->class_id,
                'name' => $section
            ]);
        }

        return redirect()->back()->with('success', 'The Section has been created!');
    }
}
