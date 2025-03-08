<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::withoutRole('Super Admin')->with(['roles','school'])->get();

        // return view('users.users',[
        //     'users' => $users
        // ]);
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
    public function edit(User $user)
    {
        return view('users.edit_user',[
            'user' => $user,
            'roles' => Role::select('name')->get(),
            'selected_role' => $user->roles()->pluck('name')->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->role_id);

        return redirect('/users')->with('success', 'User Updated Successfully!');
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
