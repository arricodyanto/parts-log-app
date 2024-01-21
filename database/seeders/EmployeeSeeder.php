<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => \bcrypt('password'),
                'avatar' => null,
                'role' => 'super admin',
                'email_verified_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => \bcrypt('password'),
                'avatar' => null,
                'role' => 'admin',
                'email_verified_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Employee::insert($employees);
    }
}
