<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SatkerKemenagResource\Pages;
use App\Filament\Resources\SatkerKemenagResource\RelationManagers;
use App\Models\SatkerKemenag;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Navigation\NavigationGroup;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SatkerKemenagResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = SatkerKemenag::class;

    protected static ?string $navigationIcon = 'heroicon-s-archive-box-arrow-down';

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
            ->columns([
                Tables\Columns\TextColumn::make('kode_satuan_kerja')->searchable(),
                Tables\Columns\TextColumn::make('kode_atasan')->searchable(),
                Tables\Columns\TextColumn::make('satuan_kerja')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ManageSatkerKemenags::route('/'),
        ];
    }
}
