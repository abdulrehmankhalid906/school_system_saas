<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return view('roles.roles',[
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.add_roles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            [
                'name' => 'required,unique:roles,name'
            ]
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success','Role Created Successfully!');
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

        $roles = Role::find($id);
        return view('roles.edit_roles', [
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Role $role, Request $request)
    {
        $request->validate([
            [
                'name' => 'required,unique:roles,name' .$role->id
            ]
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with('success','Role Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }

    public function assignRolePermissions(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
        return view('roles.assign_permissions', [
            'role' => $role,
            'permissions' => Permission::all(),
            'selected_permissions' => $role->permissions()->pluck('name')->toArray(),
        ]);
    }

    public function updateRolePermissions(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', 'Permissions assigned to role successfully');
    }
}
