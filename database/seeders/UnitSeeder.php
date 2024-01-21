<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'Truck 1',
                'unit_photo' => null,
            ],
            [
                'name' => 'Truck 2',
                'unit_photo' => null,
            ],
        ];

        Unit::insert($units);
    }
}
