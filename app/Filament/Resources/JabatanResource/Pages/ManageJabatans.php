<?php

namespace App\Filament\Resources\JabatanResource\Pages;

use App\Filament\Resources\JabatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ManageJabatans extends ManageRecords
{
    protected static string $resource = JabatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->fields([
                    ImportField::make('nama')
                        ->label('Nama'),
                    ImportField::make('bobot_sks')
                        ->label('Bobot SKS'),
                    ImportField::make('aktif')
                        ->label('Aktif'),
                    ImportField::make('keterangan')
                        ->label('Keterangan'),
                    ImportField::make('jenis_jabatans_id')
                        ->label('Jenis Jabatan'),
                ])
        ];
    }
}
