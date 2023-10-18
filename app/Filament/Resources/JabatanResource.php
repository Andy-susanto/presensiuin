<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Jabatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JabatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Awcodes\FilamentBadgeableColumn\Components\Badge;
use App\Filament\Resources\JabatanResource\RelationManagers;
use Awcodes\FilamentBadgeableColumn\Components\BadgeableColumn;

class JabatanResource extends Resource
{
    protected static ?string $model = Jabatan::class;

    protected static ?string $navigationIcon = 'heroicon-s-chart-bar';

    public static function getNavigationGroup(): ?string
    {
        return 'Data Master';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               TextInput::make('nama')->placeholder('Nama Jabatan')->required(),
               TextInput::make('bobot_sks')->numeric()->placeholder('Masukan Bobot SKS')->required(),
               Select::make('jenis_jabatans_id')->relationship('JenisJabatan', 'nama')->preload()->searchable()->required(),
               Textarea::make('keterangan')->placeholder('Isi Keterangan'),
               Toggle::make('aktif'),
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
                Tables\Columns\TextColumn::make('aktif')
                    ->badge()
                    ->formatStateUsing(function(string $state){
                        return match($state){
                            '1' => 'Aktif',
                            '0' => 'Tidak Aktif',
                            default => 'Tidak Aktif'
                        };
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    })
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
