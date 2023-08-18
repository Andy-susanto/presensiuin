<?php

namespace App\Filament\Resources\JenjangPendidikanResource\Pages;

use App\Filament\Resources\JenjangPendidikanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenjangPendidikans extends ManageRecords
{
    protected static string $resource = JenjangPendidikanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
