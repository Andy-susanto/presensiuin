<?php

namespace Database\Seeders;

use App\Models\StatusKepegawaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusKepegawaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pegawai Negeri Sipil',
                'nama_singkat' => 'PNS'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Tenaga Kontrak',
                'nama_singkat' => 'Kontrak'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pegawai dengan Perjanjian Kerja',
                'nama_singkat' => 'P3K'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Luar Biasa',
                'nama_singkat' => 'LB'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Dosen Pendidikan Klinis',
                'nama_singkat' => 'Dosdiklin'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Lainnya',
                'nama_singkat' => 'LN'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Dosen Praktisi',
                'nama_singkat' => 'DPNP'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Tutor',
                'nama_singkat' => 'Tutor'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Instruktur',
                'nama_singkat' => 'Inst'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Praktisi MBKM',
                'nama_singkat' => 'PrakMBKM'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'PNS di Perbantukan',
                'nama_singkat' => 'PNS Di perbantukan'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Dosen Tetap non-ASN',
                'nama_singkat' => 'Dosen Tetap non-ASN'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Calon Pegawai Negeri Sipil',
                'nama_singkat' => 'CPNS'
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            StatusKepegawaian::create($data[$i]);
        }
    }
}
