<?php

namespace App\Filament\Resources\AlasanResource\Pages;

use App\Filament\Resources\AlasanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAlasan extends CreateRecord
{
    protected static string $resource = AlasanResource::class;
    public static function canCreateAnother(): bool
    {
        return false;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['pegawai_id'] = auth()->user()?->pegawai_id;
        return $data;
    }
}
