<?php

namespace Database\Seeders;

use App\Models\VehicleSpecification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VehicleSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicle_specs = [
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Engine',
                'specs_value' => '6',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Cylinders',
                'specs_value' => '6 in line',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Bore (mm)',
                'specs_value' => '135',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Stroke (mm)',
                'specs_value' => '150',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Capacity',
                'specs_value' => '12.88',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Max power (HP/Kw)',
                'specs_value' => '440/324',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'rpm',
                'specs_value' => '1450-1900',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Max torque (Nm/mKg)',
                'specs_value' => '2100/214',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'rpm',
                'specs_value' => '900-1470',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Euro 3',
                'specs_value' => '80 liter',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Fuel System',
                'specs_value' => 'Unit pump injector',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'specs' => 'Speed Limiter',
                'specs_value' => '90 km/h',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => '7f008cb5-52e2-4283-9d78-cc14ea582749',
                'specs' => 'Engine',
                'specs_value' => '4',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        VehicleSpecification::insert($vehicle_specs);
    }
}
