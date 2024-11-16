<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.users',[
            'users' => User::with(['roles','school'])->get()
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
        try
        {
            $user = User::with('school')->findOrFail($id);

            if($user->school)
            {
                $user->school->delete();
            }

            $user->delete();

            return response()->json(['message' => 'The user, their school, and all associated data have been removed successfully!']);
        }
        catch(Exception $ex)
        {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $ex->getMessage()
            ], 500);
        }
    }
}
