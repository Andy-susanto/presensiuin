<?php

namespace App\Filament\Resources\LiburResource\Pages;

use App\Jobs\CalendarJOb;
use Filament\Pages\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use App\Filament\Resources\LiburResource;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Pages\ManageRecords;

class ManageLiburs extends ManageRecords
{
    protected static string $resource = LiburResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('update_hari_libur')
                ->icon('heroicon-s-clock')
                ->label('Update data libur')
                ->form([
                    DatePicker::make('tanggal')
                        ->label('Pilih Bulan Tahun')
                        ->native(false)
                        ->displayFormat('m/Y')
                        ->closeOnDateSelection()
                ])
                ->action(function (array $data) {
                    Notification::make()
                        ->title('Selesai')
                        ->success()
                        ->send();
                    CalendarJOb::dispatchAfterResponse($data['tanggal']);
                    redirect(request()->headers->get('referer'));
                })
        ];
    }
}
