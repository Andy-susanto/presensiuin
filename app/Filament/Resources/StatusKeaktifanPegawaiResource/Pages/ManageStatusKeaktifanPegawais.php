<?php

namespace App\Filament\Resources\StatusKeaktifanPegawaiResource\Pages;

use App\Filament\Resources\StatusKeaktifanPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatusKeaktifanPegawais extends ManageRecords
{
    protected static string $resource = StatusKeaktifanPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
