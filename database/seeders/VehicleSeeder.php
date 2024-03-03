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
                'id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'name' => 'IVECO TRAKKER AD 410T44 H',
                'vehicle_photo' => 'truck-iveco.jpg',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => '7f008cb5-52e2-4283-9d78-cc14ea582749',
                'name' => 'IVECO TRAKKER AD 410T77 A',
                'vehicle_photo' => 'truck-iveco-2.jpg',
                'created_at' => date('Y-m-d H:i:s', strtotime('+1 second')),
                'updated_at' => date('Y-m-d H:i:s', strtotime('+1 second')),
            ],
        ];

        Vehicle::insert($units);
    }
}
