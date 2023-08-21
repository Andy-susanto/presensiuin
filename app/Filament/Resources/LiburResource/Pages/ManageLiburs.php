<?php

namespace App\Filament\Resources\LiburResource\Pages;

use App\Filament\Resources\LiburResource;
use App\Jobs\CalendarJOb;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;
use Filament\Notifications\Notification;

class ManageLiburs extends ManageRecords
{
    protected static string $resource = LiburResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('update_hari_libur')
                ->label('Update data libur bulan ini')
                ->action(function () {
                    Notification::make()
                        ->title('Selesai')
                        ->success()
                        ->send();
                    CalendarJOb::dispatchAfterResponse();
                    return redirect(request()->header('Referer'));
                })
        ];
    }
}
