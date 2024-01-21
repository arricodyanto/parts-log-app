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
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 250,
                'description' => '250 Part Description',
                'name' => 'Filter',
                'price' => 80,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 250,
                'description' => '250 Part Description 2',
                'name' => 'Door Step',
                'price' => 41,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 500,
                'description' => '500 Part Description 1',
                'name' => 'Part Name 1',
                'price' => 116,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 500,
                'description' => '500 Part Description 2',
                'name' => 'Part Name 2',
                'price' => 74,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 500,
                'description' => '500 Part Description 3',
                'name' => 'Part Name 3',
                'price' => 216,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'id_part' => Str::uuid(),
                'unit_id' => 'bc0776ed-39aa-43b8-931e-6fe08d34bc44',
                'scale' => 1000,
                'description' => '1000 Part Description 1',
                'name' => 'Part Name 1',
                'price' => 600,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
        ];

        Part::insert($parts);
    }
}
