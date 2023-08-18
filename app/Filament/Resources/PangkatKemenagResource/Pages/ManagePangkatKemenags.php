<?php

namespace App\Filament\Resources\PangkatKemenagResource\Pages;

use Filament\Pages\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\PangkatKemenagResource;
use App\Jobs\PangkatJob;
use App\Models\PangkatKemenag;

class ManagePangkatKemenags extends ManageRecords
{
    protected static string $resource = PangkatKemenagResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Actions\Action::make('update_data')
                ->label('Update Data dari Kemenag')
                ->action(function () {
                    Notification::make()
                        ->title('Selesai')
                        ->success()
                        ->send();
                    PangkatJob::dispatch();
                    return redirect(request()->header('Referer'));
                })
        ];
    }
}
