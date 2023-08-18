<?php

namespace Database\Seeders;

use App\Models\PangkatGolongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PangkatGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'I/a',
                'nama' => 'Juru Muda',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'I/b',
                'nama' => 'Juru Muda Tingkat 1',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'I/c',
                'nama' => 'Juru',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'I/d',
                'nama' => 'Juru Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'II/a',
                'nama' => 'Pengatur Muda',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'II/b',
                'nama' => 'Pengatur Muda Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'II/c',
                'nama' => 'Pengatur',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'II/d',
                'nama' => 'Pengatur Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'III/a',
                'nama' => 'Penata Muda',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'III/b',
                'nama' => 'Penata Muda Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'III/c',
                'nama' => 'Penata',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'III/d',
                'nama' => 'Penata Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'III/d',
                'nama' => 'Penata Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'IV/a',
                'nama' => 'Pembina',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'IV/b',
                'nama' => 'Pembina Tingkat I',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'IV/c',
                'nama' => 'Pembina Utama Muda',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'IV/d',
                'nama' => 'Pembina Utama Madya',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => 'IV/e',
                'nama' => 'Pembina Utama',
                'tarif_uang_makan' => 0
            ],
            [
                'id' => Str::orderedUuid()->toString(),
                'kode' => '-',
                'nama' => 'Tidak Ada',
                'tarif_uang_makan' => 0
            ],
        ];

        for ($i = 0; $i < count($data); $i++) {
            PangkatGolongan::create($data[$i]);
        }
    }
}
