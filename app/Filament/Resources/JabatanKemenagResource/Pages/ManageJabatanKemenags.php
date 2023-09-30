<?php

namespace App\Filament\Resources\JabatanKemenagResource\Pages;

use App\Filament\Resources\JabatanKemenagResource;
use App\Jobs\JabatanJob;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Notifications\Notification;

class ManageJabatanKemenags extends ManageRecords
{
    protected static string $resource = JabatanKemenagResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('update_data')
                ->label('Update Data dari Kemenag')
                ->icon('heroicon-o-arrow-down-on-square')
                ->color('gray')
                ->action(function () {
                    Notification::make()
                        ->title('Selesai')
                        ->success()
                        ->send();
                    JabatanJob::dispatchAfterResponse();
                    return redirect(request()->header('Referer'));
                })
        ];
    }
}
