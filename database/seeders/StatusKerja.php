<?php

namespace Database\Seeders;

use App\Models\StatusKerja as ModelsStatusKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusKerja extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Tenaga Kependidikan'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Dosen'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Satuan Pengaman'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Facility Care'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Lainnya'
            ]
        ];

        for ($i = 0; $i < count($data); $i++) {
            ModelsStatusKerja::create($data[$i]);
        }
    }
}
