<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersController
{
    public function index()
    {
        $users = User::where('account_id', auth()->user()->account_id)->paginate(25);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['base', 'owner'])->get();
        return view('users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request)

    {
        $data = $request->validated();
        $user = User::new($data);
        if ($user) {
            $user->assignRole($data['role']);
            return redirect()
                ->route('admin.users.index')
                ->with(['success' => 'User successfully created']);
        } else {
            return redirect()
                ->back()
                ->with(['error' => 'Error creating user']);
        }
    }

    public function show(User $user)
    {
    }

    public function edit(User $user)
    {
        $roles = Role::whereNotIn('name', ['base', 'owner'])->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $result = $user->update($data);
        if ($result) {
            return redirect()->route('admin.users.index')->with('success', 'User has been updated');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Error updating user');
        }
    }

    public function destroy(User $user)
    {
        $result = $user->delete();
        if ($result) {
        return redirect()->route('admin.users.index')->with('success', 'User has been deleted');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'Error deleting user');
        }
    }
}
