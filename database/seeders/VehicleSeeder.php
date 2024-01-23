<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'id_vehicle' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'name' => 'IVECO TRAKKER AD 410T44 H',
                'vehicle_photo' => null,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_vehicle' => '7f008cb5-52e2-4283-9d78-cc14ea582749',
                'name' => 'IVECO TRAKKER AD 410T77 A',
                'vehicle_photo' => null,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Vehicle::insert($units);
    }
}