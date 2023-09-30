<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PangkatKemenagResource\Pages;
use App\Filament\Resources\PangkatKemenagResource\RelationManagers;
use App\Models\PangkatKemenag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PangkatKemenagResource extends Resource
{
    protected static ?string $model = PangkatKemenag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Kemenag';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_pangkat')->searchable(),
                Tables\Columns\TextColumn::make('pangkat')->searchable(),
                Tables\Columns\TextColumn::make('gol_ruang')->searchable(),
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
            'index' => Pages\ManagePangkatKemenags::route('/'),
        ];
    }
}
