<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = Account::create([
            'email' => 'admin@ukr.net',
        ]);
        $ownerAccount = User::create([
            'name' => 'Vladyslav',
            'account_id' => $account->id,
            'email' => 'admin@ukr.net',
            'password' => Hash::make('password'), // Use a strong password
        ]);
        $ownerAccount->assignRole('owner');
        User::factory()->count(50)->create()->each(function ($user) {
            $roles = ['admin', 'employee'];
            $user->assignRole($roles[rand(0,1)]);
        });
    }
}
