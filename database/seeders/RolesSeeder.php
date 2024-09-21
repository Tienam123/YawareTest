<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesPermission = config('acl');
        foreach ($rolesPermission as $roleName => $permissions) {
            $role = Role::findOrCreate($roleName);
            $role->syncPermissions($permissions);
        }
    }
}
