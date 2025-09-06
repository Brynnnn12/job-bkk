<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //membuat role admin
        $adminRole = Role::create([
            'name' => 'Admin',
        ]);

        //membuat role User
        $userRole = Role::create([
            'name' => 'User',
        ]);

        //membuat akun admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);

        //memberi role admin ke akun admin
        $admin->assignRole($adminRole);

        //membuat akun user
        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => now(),
        ]);

        //memberi role user ke akun user
        $user->assignRole($userRole);
    }
}
