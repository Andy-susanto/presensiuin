<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JabfungResource\Pages;
use App\Filament\Resources\JabfungResource\RelationManagers;
use App\Models\Jabfung;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabfungResource extends Resource
{
    protected static ?string $model = Jabfung::class;

    protected static ?string $navigationIcon = 'heroicon-s-paper-clip';

    protected static ?string $navigationLabel = 'Jabatan Fungsional';
    protected static ?string $label = 'Jabatan Fungsional';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('nama')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('angka_kredit')
                    ->numeric()
                    ->required()
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('angka_kredit'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJabfungs::route('/'),
            'create' => Pages\CreateJabfung::route('/create'),
            'edit' => Pages\EditJabfung::route('/{record}/edit'),
        ];
    }
}
