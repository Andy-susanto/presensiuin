<?php

namespace App\Filament\Pages;

use App\Models\Presensi;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Database\Eloquent\Relations\Relation;

class RiwayatPresensi extends Page implements HasTable
{
    use InteractsWithTable;
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.riwayat-presensi';

    protected function getTableQuery(): Builder|Relation
    {
        return Presensi::query()->where('pegawai_id', Auth::user()->pegawai_id);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_RiwayatPresensi');
    }

    public function mount()
    {
        abort_unless(auth()->user()->can('page_RiwayatPresensi'), 403);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('tanggal')->date(),
            TextColumn::make('pegawai.nama_lengkap')->label("Nama Pegawai"),
            ImageColumn::make('foto')->label('Foto Presensi')->square()->width(200)->height(200),
            TextColumn::make('waktu')->time(),
            ViewColumn::make("ip")->label('Lokasi Presensi')->view('lokasi'),
        ];
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'md' => 2,
            'xl' => 2,
        ];
    }
}
