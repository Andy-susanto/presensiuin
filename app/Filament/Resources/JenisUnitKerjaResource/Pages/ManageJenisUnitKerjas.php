<?php

namespace App\Filament\Resources\JenisUnitKerjaResource\Pages;

use App\Filament\Resources\JenisUnitKerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisUnitKerjas extends ManageRecords
{
    protected static string $resource = JenisUnitKerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
