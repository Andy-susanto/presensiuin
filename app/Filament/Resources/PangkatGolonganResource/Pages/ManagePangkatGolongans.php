<?php

namespace App\Filament\Resources\PangkatGolonganResource\Pages;

use App\Filament\Resources\PangkatGolonganResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePangkatGolongans extends ManageRecords
{
    protected static string $resource = PangkatGolonganResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
