<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Entities;

class EntitiesSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'type' => 3,
                'description' => 'Controller',
            ],
            [
                'type' => 4,
                'description' => 'Anchor A',
            ],
            [
                'type' => 4,
                'description' => 'Anchor B',
            ],
            [
                'type' => 4,
                'description' => 'Anchor C',
            ],
            [
                'type' => 4,
                'description' => 'Anchor D',
            ],
            [
                'type' => 5,
                'description' => 'Tag',
            ],
            [
                'type' => 2,
                'description' => 'User',
            ],
        ];
        Entities::insert($data);
    }
}