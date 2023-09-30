<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Presensi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Layout;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PresensiResource\Pages;
use Filament\Tables\Enums\FiltersLayout;

class PresensiResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return 'Presensi';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'xl' => 2,
            ])
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nama_lengkap'),
                // Tables\Columns\TextColumn::make('waktu_presensi_id'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date(),
                Tables\Columns\TextColumn::make('waktu'),
                Tables\Columns\ImageColumn::make('foto')->square()->size(150),
                Tables\Columns\TextColumn::make('lat'),
                Tables\Columns\TextColumn::make('long'),
                Tables\Columns\TextColumn::make('ip'),
                Tables\Columns\TextColumn::make('keterangan'),
            ])
            ->filters([
                SelectFilter::make('pegawai_id')->label('Nama Pegawai')->relationship('pegawai', 'nama_pegawai')->columnSpan(5)->preload()->searchable()
            ], layout: FiltersLayout::AboveContent)->persistFiltersInSession()
            ->actions([
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPresensis::route('/'),
        ];
    }
}
