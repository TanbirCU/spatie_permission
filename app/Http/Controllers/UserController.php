<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::get();
        return view('users.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'roles' => 'required|array',
        ]);

        $user = User::create($request->only('name', 'email', 'password'));

        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $user->syncRoles($roleNames);

        return redirect()->route('users.index')
                         ->with('message', 'User created successfully.');
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
        $data['user'] = $user;
        $data['roles'] = Role::get();
        $data['userRoles'] = $user->roles->pluck('id')->toArray();
        return view('users.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required|array',
        ]);
        $data=[
            'name' => $request->name,
            'email' => $request->email,
        ];
        if(!empty($request->password)){
            $data +=[
                'password'=> Hash::make($request->password),
            ];
        }
        $user->update($data);
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
       $user->syncRoles($roleNames);
        return redirect()->route('users.index')
                         ->with('message', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('message', 'User deleted successfully.');
    }
}
