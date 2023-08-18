<?php

namespace App\Filament\Resources\SatkerKemenagResource\Pages;

use App\Filament\Resources\SatkerKemenagResource;
use App\Jobs\SatkerJob;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSatkerKemenags extends ManageRecords
{
    protected static string $resource = SatkerKemenagResource::class;

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
                    SatkerJob::dispatchAfterResponse();
                    return redirect(request()->header('Referer'));
                })
        ];
    }
}
