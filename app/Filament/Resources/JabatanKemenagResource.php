<?php

namespace App\Filament\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JabatanKemenag;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JabatanKemenagResource\Pages;
use App\Filament\Resources\JabatanKemenagResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Model;

class JabatanKemenagResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = JabatanKemenag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Kemenag';
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups(['grade'])
            ->deferLoading()
            ->striped()
            ->columns([
                TextColumn::make('kode_jabatan')->sortable()->searchable(),
                TextColumn::make('jabatan')->searchable(),
                TextColumn::make('tampil_jabatan')->searchable(),
                TextColumn::make('usia_jabatan')->searchable(),
                TextColumn::make('tunjangan')->formatStateUsing(fn (string $state): string => 'Rp. ' . number_format($state, 2))->searchable(),
                TextColumn::make('grade')->searchable(),
            ])
            ->filters([

            ],layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
            //    EditAction::make(),
            //    DeleteAction::make(),
            ])
            ->bulkActions([
            //    DeleteBulkAction::make(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageJabatanKemenags::route('/'),
        ];
    }
}
