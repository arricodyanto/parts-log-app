<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parts = [
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'hours_meter' => 250,
                'desc' => 'Engine Oil - Drain & Refill',
                'group_desc' => 'Lube & Fluid',
                'part_no' => 'DELO15W40C',
                'part_desc' => 'CAT DEO SAE15W40',
                'qty' => 35,
                'repl' => 100,
                'unit' => 'L',
                'price' => 2.25,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'hours_meter' => 250,
                'desc' => '250 SVC Hour Maintenance - Perform',
                'group_desc' => 'PM 250',
                'part_no' => '5801592275',
                'part_desc' => 'OIL FILTER CARTRIDGE',
                'qty' => 1,
                'repl' => 100,
                'unit' => 'PC',
                'price' => 110.73,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'hours_meter' => 250,
                'desc' => '250 SVC Hour Maintenance - Perform',
                'group_desc' => 'PM 250',
                'part_no' => '2020PM-OR',
                'part_desc' => 'FUEL RACOR 30M',
                'qty' => 1,
                'repl' => 100,
                'unit' => 'PC',
                'price' => 16.83,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'hours_meter' => 500,
                'desc' => 'Engine Oil - Drain & Refill',
                'group_desc' => 'Lube & Fluid',
                'part_no' => 'DELO15W40C',
                'part_desc' => 'CAT DEO SAE15W40',
                'qty' => 35,
                'repl' => 100,
                'unit' => 'L',
                'price' => 2.25,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'id' => Str::uuid(),
                'vehicle_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'hours_meter' => 500,
                'desc' => '500 SVC Hour Maintenance - Perform',
                'group_desc' => 'PM 500',
                'part_no' => '5801592275',
                'part_desc' => 'OIL FILTER CARTRIDGE',
                'qty' => 1,
                'repl' => 100,
                'unit' => 'PC',
                'price' => 110.73,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
        ];

        Part::insert($parts);
    }
}
