<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            [
                'id_employee' => Str::uuid(),
                'name' => 'Super Admin',
                'email' => 'super@admin.com',
                'password' => \bcrypt('password'),
                'avatar' => null,
                'role' => 'super admin',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_employee' => Str::uuid(),
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => \bcrypt('password'),
                'avatar' => null,
                'role' => 'admin',
                'email_verified_at' => date('Y-m-d H:i:s', time()),
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Employee::insert($employees);
    }
}
