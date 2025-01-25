<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['roles'] = Role::all();
        return view('roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ])->validate();
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Permission created successfully.');
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
    public function give_permission($roleId)
    {
        $data['permissions']=Permission::all();
        $data['role']=Role::find($roleId);
        $data['rolePermissions'] = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id",$roleId)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('roles.give_permission',$data);
    }
    public function update_permission(Request $request,$roleId)
    {
        $role=Role::find($roleId);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success','Permission updated successfully');
    }
}
