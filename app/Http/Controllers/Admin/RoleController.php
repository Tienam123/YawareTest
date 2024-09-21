<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleStoreRequest;
use App\Http\Requests\Admin\RoleUpdateRequest;
use App\Http\useCases\RoleService;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController
{
    private RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(RoleStoreRequest $request)
    {
        $data = $request->validated();
        $this->roleService->storeNewRole($data['role'], $data['permissions']);
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    public function update(RoleUpdateRequest $request, Role $role)
    {
        $data = $request->validated();
       $this->roleService->updateRole($role, $data);
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy(Role $role)
    {
        $result = $role->delete();
        if ($result) {
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
        } else {
            return redirect()->route('admin.roles.index')->with('error', 'Role not deleted.');
        }
    }
}
