<?php

namespace Database\Seeders;

use App\Models\JenisJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JenisJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'JSTK',
                'nama' => 'Struktural'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'FSD',
                'nama' => 'Fungsional Dosen'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'JFT',
                'nama' => 'Fungsional Tertentu'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'JPL',
                'nama' => 'Pelaksana'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'JTT',
                'nama' => 'Tugas Tambahan'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'LN',
                'nama' => 'Lainnya'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'JTK',
                'nama' => 'Jabatan Khusus'
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            JenisJabatan::create($data[$i]);
        }
    }
}
