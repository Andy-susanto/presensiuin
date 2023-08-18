<?php

namespace Database\Seeders;

use App\Models\JenisUnitKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JenisUnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Rektorat',
                'level' => '1',
                'urutan' => '1'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Biro',
                'level' => '2',
                'urutan' => '5'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Lembaga',
                'level' => '2',
                'urutan' => '6'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Satuan',
                'level' => '1',
                'urutan' => '4'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Unit Pelaksana Teknis',
                'level' => '2',
                'urutan' => '7'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Fakultas',
                'level' => '2',
                'urutan' => '9'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Bagian',
                'level' => '5',
                'urutan' => '18'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Jurusan',
                'level' => '3',
                'urutan' => '13'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Program Studi',
                'level' => '4',
                'urutan' => '16'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pusat',
                'level' => '3',
                'urutan' => '11'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Senat',
                'level' => '1',
                'urutan' => '2'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Dewan',
                'level' => '1',
                'urutan' => '3'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Laboratorium',
                'level' => '3',
                'urutan' => '10'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Bengkel',
                'level' => '3',
                'urutan' => '14'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Studio',
                'level' => '3',
                'urutan' => '15'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Program',
                'level' => '3',
                'urutan' => '10'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pascasarjana',
                'level' => '2',
                'urutan' => '8'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Sub Bagian',
                'level' => '6',
                'urutan' => '19'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Unit Kerja',
                'level' => '22',
                'urutan' => '22'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pengadaan',
                'level' => '102',
                'urutan' => '102'
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            JenisUnitKerja::create($data[$i]);
        }
    }
}
