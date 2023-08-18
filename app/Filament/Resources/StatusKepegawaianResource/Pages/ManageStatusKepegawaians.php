<?php

namespace App\Filament\Resources\StatusKepegawaianResource\Pages;

use App\Filament\Resources\StatusKepegawaianResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatusKepegawaians extends ManageRecords
{
    protected static string $resource = StatusKepegawaianResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
