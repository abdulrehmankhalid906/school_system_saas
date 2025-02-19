<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\InitS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreParentRequest;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = User::with('students.user')->withCount('students')->role('Parent')->where('school_id', InitS::getSchoolid())->get();

        return view('parents.parents',[
            'parents' => $parents
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
    public function store(StoreParentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['school_id'] = InitS::getSchoolid();

        $user = User::create($data);
        $user->syncRoles('Parent');

        return redirect()->back()->with('success', 'Parent has been created!');
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
            $parent = User::with('students.user')->role('Parent')->where('school_id', InitS::getSchoolid())->findOrFail($id);

            if ($parent->students->isNotEmpty()) {
                $parent->students->each->delete();
            }

            $parent->delete();
            return response()->json(['message' => 'The Parent and their students have been removed!']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred. Please try again.',
                'failure' => $e->getMessage()
            ], 500);
        }
    }
}
