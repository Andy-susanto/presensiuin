<?php

namespace App\Filament\Resources\LevelJabatanResource\Pages;

use App\Filament\Resources\LevelJabatanResource;
use App\Jobs\LevelJabatanJob;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLevelJabatans extends ManageRecords
{
    protected static string $resource = LevelJabatanResource::class;

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
                    LevelJabatanJob::dispatchAfterResponse();
                    return redirect(request()->header('Referer'));
                })
        ];
    }
}
