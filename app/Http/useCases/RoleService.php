<?php

namespace App\Http\useCases;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function __construct()
    {
    }

    public function storeNewRole($roleName, $requestPermissions): Role
    {
        $baseRole = Role::findById(1);
        $newRole = Role::create(['name' => $roleName]);
        $basePermissions = $baseRole->permissions;
        $newPermissions = Permission::whereIn('id', $requestPermissions)->get();
        $permissions = $basePermissions->merge($newPermissions);
        return $newRole->syncPermissions($permissions);
    }

    public function updateRole(Role $role, array $data): Role
    {
        $role->update([
            'name' => $data['role'],
        ]);
        $permissions = Permission::whereIn('id', $data['permissions'])->get();
        $role->syncPermissions($permissions);
        return $role;
    }
}
