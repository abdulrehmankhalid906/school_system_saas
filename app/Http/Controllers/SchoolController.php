<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('schools.schools',[
            'schools' => School::get()
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
        //
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
        try {
            $school = School::with('user')->findOrFail($id);
            
            $school->delete();

            if ($school->user)
            {
                $school->user->delete();
            }
            
            return response()->json(['message' => 'The School and all the associated data have been Removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }
}
