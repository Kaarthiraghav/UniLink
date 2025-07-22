<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@unilink.test',
            'student_staff_id' => 'A001',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@unilink.test',
            'student_staff_id' => 'L001',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Student User',
            'email' => 'student@unilink.test',
            'student_staff_id' => 'S001',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
    }
}
