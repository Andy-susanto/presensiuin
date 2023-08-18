<?php

namespace App\Filament\Resources\UnitKerjaResource\Pages;

use App\Filament\Resources\UnitKerjaResource;
use App\Models\UnitKerja;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Konnco\FilamentImport\Actions\ImportAction;
use Konnco\FilamentImport\Actions\ImportField;

class ManageUnitKerjas extends ManageRecords
{
    protected static string $resource = UnitKerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ImportAction::make()
                ->handleBlankRows()
                ->fields([
                    ImportField::make('kategori_unit_kerjas_id')
                        ->label('Kategori Unit Kerja')
                        ->rules('required'),
                    ImportField::make('lokasi')
                        ->label('lokasi'),
                    ImportField::make('nama_unit_kerja')
                        ->label('Nama Unit Kerja')
                        ->rules('required'),
                ])
        ];
    }
}
