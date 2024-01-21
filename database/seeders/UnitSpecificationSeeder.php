<?php

namespace Database\Seeders;

use App\Models\UnitSpecification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit_specifications = [
            [
                'id_unit_specification' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'type' => 'Jumlah Roda',
                'specification' => '6',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_unit_specification' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'type' => 'Wheel Base',
                'specification' => '8.621 meter',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_unit_specification' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'type' => 'Kapasitas BBM',
                'specification' => '80 liter',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_unit_specification' => Str::uuid(),
                'unit_id' => '7f008cb5-52e2-4283-9d78-cc14ea582749',
                'type' => 'Jumlah Roda',
                'specification' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        UnitSpecification::insert($unit_specifications);
    }
}
