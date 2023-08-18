<?php

namespace App\Filament\Resources\JenisJabatanResource\Pages;

use App\Filament\Resources\JenisJabatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenisJabatans extends ManageRecords
{
    protected static string $resource = JenisJabatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
