<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use App\Filament\Resources\PegawaiResource;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ManagePegawais extends ManageRecords
{
    protected static string $resource = PegawaiResource::class;
    protected static ?string $title = 'Data Master Pegawai';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->using(function (array $data) {
                    $pegawai = static::getModel()::create($data);
                    $user = User::get()->count();
                    $year = now()->format('y');
                    $formatUrut = $year . str_pad($user + 1, 4, "0", STR_PAD_LEFT);
                    $check = User::where('name', $formatUrut)->first();
                    if ($check) {
                        $formatUrut = $year . str_pad($user + 2, 4, "0", STR_PAD_LEFT);
                    }
                    try {
                        User::updateOrCreate(
                            [
                                'pegawai_id' => $pegawai->id
                            ],
                            [
                                'name' => $formatUrut,
                                'password' => bcrypt($formatUrut)
                            ]
                        );
                        $data = User::where('pegawai_id', $pegawai->id)->first();
                        $data->syncRoles('User');
                    } catch (\Throwable $th) {
                        //
                    }
                }),
            ImportAction::make()
                ->fields([
                    ImportField::make('nama_pegawai')
                        ->label('Nama Pegawai'),
                    ImportField::make('gelar_depan')
                        ->label('Gelar Depan'),
                    ImportField::make('gelar_belakang')
                        ->label('Gelar Belakang'),
                    ImportField::make('nip')
                        ->label('NIP'),
                    ImportField::make('jenis_no_induk')
                        ->label('Jenis No Induk'),
                    ImportField::make('tanggal_masuk')
                        ->label('Tanggal Masuk'),
                    ImportField::make('tanggal_keluar')
                        ->label('Tanggal Keluar'),
                    ImportField::make('unit_kerjas_id')
                        ->label('Unit Kerja'),
                    ImportField::make('status_kerjas_id')
                        ->label('Status Kerja'),
                    ImportField::make('status_kepegawaians_id')
                        ->label('Status Kepegawaian'),
                    ImportField::make('pangkat_golongans_id')
                        ->label('Pangkat Golongan'),
                    ImportField::make('status_keaktifan_pegawais_id')
                        ->label('Status Keaktifan Pegawai'),
                    ImportField::make('jabatans_id')
                        ->label('Jabatan')
                ])
        ];
    }
}
