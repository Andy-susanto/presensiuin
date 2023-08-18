<?php

namespace Database\Seeders;

use App\Models\StatusKeaktifanPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusKeaktifanPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Aktif'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Cuti'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Tugas Belajar dengan Pembebasan'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Ijin Belajar'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Pensiun'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Keluar'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Blacklist'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'PNS di perbantunkan ke instansi lain'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Mutasi'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Tugas Belajar Tanpa Pembebasan'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'Berakhir Masa Tugas Belajar'
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'nama' => 'PNS di perbantukan di UIN'
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            StatusKeaktifanPegawai::create($data[$i]);
        }
    }
}
