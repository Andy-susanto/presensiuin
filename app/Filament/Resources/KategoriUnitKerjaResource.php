<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\KategoriUnitKerja;
use Filament\Tables\Filters\Layout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KategoriUnitKerjaResource\Pages;
use Filament\Tables\Enums\FiltersLayout;
use App\Filament\Resources\KategoriUnitKerjaResource\RelationManagers;

class KategoriUnitKerjaResource extends Resource
{
    protected static ?string $model = KategoriUnitKerja::class;

    protected static ?string $navigationIcon = 'heroicon-s-inbox-stack';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')->required()->columnSpanFull(),
                Forms\Components\Select::make('jenis_unit_kerjas_id')->relationship('JenisUnitKerja', 'nama')->searchable()->preload()->required()->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('nama_kategori')->color('primary')->searchable(),
                Tables\Columns\TextColumn::make('JenisUnitKerja.nama')
            ])
            ->filters(
                [

                    Tables\Filters\SelectFilter::make('jenis_unit_kerjas_id')->label('Jenis Unit Kerja')->relationship('JenisUnitKerja', 'nama')->searchable()->columnSpan(12)->preload()
                ],
                layout: FiltersLayout::AboveContent,
            )
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
            'index' => Pages\ManageKategoriUnitKerjas::route('/'),
        ];
    }
}
