<?php

namespace App\Filament\Resources\JabfungResource\Pages;

use App\Filament\Resources\JabfungResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJabfung extends EditRecord
{
    protected static string $resource = JabfungResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
