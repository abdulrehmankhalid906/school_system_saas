<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Helpers\InitS;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\StoreSubjectRequest;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('classes.classes',[
            'classes' => Klass::where('school_id', InitS::getSchoolid())->get(),
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
}
