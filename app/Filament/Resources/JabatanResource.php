<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JabatanResource\Pages;
use App\Filament\Resources\JabatanResource\RelationManagers;
use App\Models\Jabatan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\TextInput::make('nama')->placeholder('Nama Jabatan')->required(),
                    ]),
                Forms\Components\Grid::make(6)
                    ->schema([
                        Forms\Components\TextInput::make('bobot_sks')->numeric()->placeholder('Masukan Bobot SKS')->required(),
                    ]),
                Forms\Components\Grid::make(1)
                    ->schema([
                        Forms\Components\Select::make('jenis_jabatans_id')->relationship('JenisJabatan', 'nama')->preload()->searchable()->required(),
                        Forms\Components\Textarea::make('keterangan')->placeholder('Isi Keterangan'),
                        Forms\Components\Toggle::make('aktif'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\BadgeColumn::make('bobot_sks')->color('warning'),
                Tables\Columns\BadgeColumn::make('JenisJabatan.nama')->color('primary')->searchable(),
                Tables\Columns\TextColumn::make('keterangan')->wrap()->html(),
                Tables\Columns\BadgeColumn::make('aktif')->enum([
                    1 => 'Aktif',
                    0 => 'Tidak Aktif'
                ])->colors([
                    'success' => 1,
                    'danger' => 0,
                ]),
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
            'index' => Pages\ManageJabatans::route('/'),
        ];
    }
}
