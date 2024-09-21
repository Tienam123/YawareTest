<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesPermission = config('acl');
        foreach ($rolesPermission as $roleName => $permissions) {
            foreach ($permissions as $permission) {
                Permission::findOrCreate($permission);
            }
        }
    }
}
