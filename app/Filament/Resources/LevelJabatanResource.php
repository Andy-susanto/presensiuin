<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelJabatanResource\Pages;
use App\Filament\Resources\LevelJabatanResource\RelationManagers;
use App\Models\LevelJabatan;
use App\Models\LevelJabatanKemenag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LevelJabatanResource extends Resource
{
    protected static ?string $model = LevelJabatanKemenag::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationGroup(): ?string
    {
        return 'Data Kemenag';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_level_jabatan')->searchable(),
                Tables\Columns\TextColumn::make('level_jabatan')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLevelJabatans::route('/'),
        ];
    }
}
