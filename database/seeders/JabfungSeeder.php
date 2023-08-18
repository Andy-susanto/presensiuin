<?php

namespace Database\Seeders;

use App\Models\Jabfung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabfungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Tenaga Pengajar',
                'angka_kredit' => '0'
            ],
            [
                'nama' => 'Asisten Ahli',
                'angka_kredit' => '100'
            ],
            [
                'nama' => 'Asisten Ahli',
                'angka_kredit' => '150'
            ],
            [
                'nama' => 'Lektor',
                'angka_kredit' => '200'
            ],
            [
                'nama' => 'Lektor',
                'angka_kredit' => '300'
            ],
            [
                'nama' => 'Lektor Kepala',
                'angka_kredit' => '400'
            ],
            [
                'nama' => 'Lektor Kepala',
                'angka_kredit' => '550'
            ],
            [
                'nama' => 'Lektor Kepala',
                'angka_kredit' => '700'
            ],
            [
                'nama' => 'Profesor',
                'angka_kredit' => '850'
            ],
            [
                'nama' => 'Profesor',
                'angka_kredit' => '1050'
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            Jabfung::create($data[$i]);
        }
    }
}
