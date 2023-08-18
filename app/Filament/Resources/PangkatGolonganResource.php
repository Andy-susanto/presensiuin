<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PangkatGolonganResource\Pages;
use App\Filament\Resources\PangkatGolonganResource\RelationManagers;
use App\Models\PangkatGolongan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PangkatGolonganResource extends Resource
{
    protected static ?string $model = PangkatGolongan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode')->required(),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('tarif_uang_makan')->numeric()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('tarif_uang_makan')->money('idr')
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
            'index' => Pages\ManagePangkatGolongans::route('/'),
        ];
    }
}
