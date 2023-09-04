<?php

namespace App\Filament\Resources\PresensiResource\Pages;

use App\Filament\Resources\PresensiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresensis extends ListRecords
{
    protected static string $resource = PresensiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
