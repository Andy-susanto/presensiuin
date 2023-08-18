<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JabatanKemenagResource\Pages;
use App\Filament\Resources\JabatanKemenagResource\RelationManagers;
use App\Models\JabatanKemenag;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanKemenagResource extends Resource
{
    protected static ?string $model = JabatanKemenag::class;

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
                Tables\Columns\TextColumn::make('kode_jabatan')->searchable(),
                Tables\Columns\TextColumn::make('jabatan')->searchable(),
                Tables\Columns\TextColumn::make('tampil_jabatan')->searchable(),
                Tables\Columns\TextColumn::make('usia_jabatan')->searchable(),
                Tables\Columns\TextColumn::make('tunjangan')->formatStateUsing(fn (string $state): string => 'Rp. ' . number_format($state, 2))->searchable(),
                Tables\Columns\TextColumn::make('grade')->searchable(),
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
            'index' => Pages\ManageJabatanKemenags::route('/'),
        ];
    }
}
