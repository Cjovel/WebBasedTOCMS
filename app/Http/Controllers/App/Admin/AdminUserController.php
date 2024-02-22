<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = user::all();

        return view('app.admin.users.home', ['users' => $users]);
    }

    public function create()
    {
        return view('app.admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|min:8',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required',
        ]);
        $data['password'] = Hash::make($data['password']);

        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $newRole = Role::create([
            'level' => $data['level'],
            'status' => 1,
            'user_id' => $newUser->id,
        ]);

        return redirect(route('app.admin.users.index'))->with('status', 'User has been successfully saved!');
    }

    public function modify(User $user)
    {
        return view('app.admin.users.modify', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' =>'required|min:8',
            'level' =>'required',
            'status' =>'required',
        ]);

        $user->update(['name' => $data['name']]);

        $user->role->update([
            'level' => $data['level'],
            'status' => $data['status'],
        ]);

        return redirect(route('app.admin.users.modify', ['user' => $user]))->with('status', 'User has been successfully updated!');
    }

    public function delete(User $user)
    {
        return view('app.admin.users.delete', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('app.admin.users.index'))->with('status', 'User has been successfully deleted!');
    }

    public function reset(User $user)
    {
        return view('app.admin.users.reset', ['user' => $user]);
    }

    public function resetOk(User $user)
    {
        $user->update(['password' => Hash::make('P@ssw0rd')]);

        return redirect(route('app.admin.users.index'))->with('status', 'User password has been successfully reset');
    }
}
