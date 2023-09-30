<?php

namespace App\Filament\Resources\JabfungResource\Pages;

use App\Filament\Resources\JabfungResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJabfungs extends ListRecords
{
    protected static string $resource = JabfungResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Buat Baru')->color('success')->icon('heroicon-o-plus-circle'),
        ];
    }
}
