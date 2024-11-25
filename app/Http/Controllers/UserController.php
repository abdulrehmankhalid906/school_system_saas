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
    public function index(Request $request)
    {
        $users = User::with(['roles','school']);

        if ($request->q) {
            $users = $users->where('name', 'LIKE', '%' . $request->q . '%');
        }

        $users = $users->get();

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


    public function allParents()
    {
        $parents = User::with('students.user')->role('Parent')->where('school_id', InitS::getSchoolid())->get();

        // $data = \DB::table('users')
        // ->join('model_has_roles', 'users.id','=','model_has_roles.model_id')
        // ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        // ->select('users.*', 'roles.name as role_name')
        // ->get();

        // $data = User::wRole::where('name', 'Parent')->first();
        // dd($users);


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
