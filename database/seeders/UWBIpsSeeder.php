<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UwbIps;

class UWBIpsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'uwb' => 2,
                'ip' => '00:0A'
            ],
            [
                'uwb' => 3,
                'ip' => '00:0B'
            ],
            [
                'uwb' => 4,
                'ip' => '00:0C'
            ],
            [
                'uwb' => 5,
                'ip' => '00:0D'
            ],
            [
                'uwb' => 6,
                'ip' => '10:01'
            ]
        ];
        UwbIps::insert($data);
    }
}
