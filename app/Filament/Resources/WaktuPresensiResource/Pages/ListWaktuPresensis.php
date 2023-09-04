<?php

namespace App\Filament\Resources\WaktuPresensiResource\Pages;

use App\Filament\Resources\WaktuPresensiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWaktuPresensis extends ListRecords
{
    protected static string $resource = WaktuPresensiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
