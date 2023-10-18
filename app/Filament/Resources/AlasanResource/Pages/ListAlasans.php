<?php

namespace App\Filament\Resources\AlasanResource\Pages;

use App\Filament\Resources\AlasanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlasans extends ListRecords
{
    protected static string $resource = AlasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
