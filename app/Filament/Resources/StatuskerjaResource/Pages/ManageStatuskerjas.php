<?php

namespace App\Filament\Resources\StatuskerjaResource\Pages;

use App\Filament\Resources\StatuskerjaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatuskerjas extends ManageRecords
{
    protected static string $resource = StatuskerjaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
