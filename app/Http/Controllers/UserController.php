<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helpers\InitS;
use App\Http\Requests\StoreParentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withoutRole('Super Admin')->with(['roles','school'])->get();

        return view('users.users',[
            'users' => $users
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


    public function allParents()
    {
        $parents = User::with('students.user')->withCount('students')->role('Parent')->where('school_id', InitS::getSchoolid())->get();

        return view('parents.parents',[
            'parents' => $parents
        ]);
    }

    public function createParent(StoreParentRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['school_id'] = InitS::getSchoolid();

        $user = User::create($data);
        $user->syncRoles('Parent');

        return redirect()->back()->with('success', 'Subject has been created!');
    }
}
