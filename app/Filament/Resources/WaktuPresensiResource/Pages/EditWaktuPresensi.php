<?php

namespace App\Filament\Resources\WaktuPresensiResource\Pages;

use App\Filament\Resources\WaktuPresensiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWaktuPresensi extends EditRecord
{
    protected static string $resource = WaktuPresensiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
