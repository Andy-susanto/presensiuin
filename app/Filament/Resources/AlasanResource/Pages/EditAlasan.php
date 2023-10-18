<?php

namespace App\Filament\Resources\AlasanResource\Pages;

use App\Filament\Resources\AlasanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAlasan extends EditRecord
{
    protected static string $resource = AlasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
