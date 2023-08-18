<?php

namespace Database\Seeders;

use App\Models\JenjangPendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tidak Sekolah',
                'kode' => '-'
            ],
            [
                'nama' => 'PAUD',
                'kode' => '-'
            ],
            [
                'nama' => 'TK/Sederajat',
                'kode' => '-'
            ],
            [
                'nama' => 'Putus SD',
                'kode' => '-'
            ],
            [
                'nama' => 'SD / Sederajat',
                'kode' => '-'
            ],
            [
                'nama' => 'SMP / Sederajat',
                'kode' => '-'
            ],
            [
                'nama' => 'SMA / Sederajat',
                'kode' => '-'
            ],
            [
                'nama' => 'Diploma I',
                'kode' => 'D1'
            ],
            [
                'nama' => 'Diploma II',
                'kode' => 'D2'
            ],
            [
                'nama' => 'Diploma III',
                'kode' => 'D3'
            ],
            [
                'nama' => 'Diploma IV',
                'kode' => 'D4'
            ],
            [
                'nama' => 'Profesi',
                'kode' => '-'
            ],
            [
                'nama' => 'Strata 1',
                'kode' => 'S1'
            ],
            [
                'nama' => 'Spesialis',
                'kode' => 'Sp-1'
            ],
            [
                'nama' => 'Strata 2',
                'kode' => 'S2'
            ],
            [
                'nama' => 'Magister',
                'kode' => 'Sp-2'
            ],
            [
                'nama' => 'Strata 3',
                'kode' => 'S3'
            ],
            [
                'nama' => 'Non Formal',
                'kode' => '-'
            ],
            [
                'nama' => 'informal',
                'kode' => '-'
            ],
            [
                'nama' => 'Lainnya',
                'kode' => '-'
            ]
        ];

        for ($i = 0; $i < count($data); $i++) {
            JenjangPendidikan::create($data[$i]);
        }
    }
}
