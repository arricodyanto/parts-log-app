<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'id_unit' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'name' => 'Truck 1',
                'unit_photo' => null,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_unit' => '7f008cb5-52e2-4283-9d78-cc14ea582749',
                'name' => 'Truck 2',
                'unit_photo' => null,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Unit::insert($units);
    }
}
