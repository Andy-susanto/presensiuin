<?php

namespace App\Filament\Resources\KategoriUnitKerjaResource\Pages;

use App\Filament\Resources\KategoriUnitKerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ManageKategoriUnitKerjas extends ManageRecords
{
    protected static string $resource = KategoriUnitKerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->fields([
                    ImportField::make('nama_kategori')
                        ->label('Nama Kategori'),
                    ImportField::make('jenis_unit_kerjas_id')
                        ->label('Jenis Unit Kerja'),
                ])
        ];
    }
}
