<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitKerjaResource\Pages;
use App\Filament\Resources\UnitKerjaResource\RelationManagers;
use App\Models\UnitKerja;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitKerjaResource extends Resource
{
    protected static ?string $model = UnitKerja::class;

    protected static ?string $navigationIcon = 'heroicon-s-building-office';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('nama_unit_kerja')->required(),
                        Forms\Components\TextInput::make('lokasi'),
                        Forms\Components\Select::make('kategori_unit_kerjas_id')->relationship('KategoriUnitKerja', 'nama_kategori')->preload()->required()->searchable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->groups([
                Group::make('KategoriUnitKerja.nama_kategori')
                    ->label('KATEGORI')
                    ->collapsible()
            ])
            ->columns([
                Tables\Columns\TextColumn::make('nama_unit_kerja')->searchable(),
                Tables\Columns\TextColumn::make('lokasi')->searchable(),
                Tables\Columns\TextColumn::make('KategoriUnitKerja.nama_kategori')->searchable()->badge()->color('success'),
            ])
            ->filters(
                [
                    Tables\Filters\SelectFilter::make('kategori_unit_kerjas_id')->label('Kategori Unit Kerja')->relationship('KategoriUnitKerja', 'nama_kategori')->searchable()->columnSpan(12)
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
            'index' => Pages\ManageUnitKerjas::route('/'),
        ];
    }
}
