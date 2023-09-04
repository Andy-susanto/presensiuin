<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Presensi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Layout;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PresensiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PresensiResource\RelationManagers;

class PresensiResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form->schema([]);
        // ->schema([
        //     Forms\Components\TextInput::make('pegawai_id')
        //         ->required()
        //         ->maxLength(36),
        //     Forms\Components\TextInput::make('waktu_presensi_id')
        //         ->maxLength(36),
        //     Forms\Components\DatePicker::make('tanggal'),
        //     Forms\Components\TextInput::make('waktu'),
        //     Forms\Components\TextInput::make('foto')
        //         ->maxLength(255),
        //     Forms\Components\TextInput::make('lat')
        //         ->maxLength(255),
        //     Forms\Components\TextInput::make('long')
        //         ->maxLength(255),
        //     Forms\Components\TextInput::make('ip')
        //         ->maxLength(255),
        //     Forms\Components\Textarea::make('keterangan')
        //         ->maxLength(65535),
        // ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nama_lengkap'),
                // Tables\Columns\TextColumn::make('waktu_presensi_id'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date(),
                Tables\Columns\TextColumn::make('waktu'),
                Tables\Columns\ImageColumn::make('foto')->square()->size(150),
                Tables\Columns\TextColumn::make('lat'),
                Tables\Columns\TextColumn::make('long'),
                Tables\Columns\TextColumn::make('ip'),
                Tables\Columns\TextColumn::make('keterangan'),
            ])
            ->filters([
                SelectFilter::make('pegawai_id')->label('Nama Pegawai')->relationship('pegawai', 'nama_pegawai')->columnSpan(5)->searchable()
            ], layout: Layout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPresensis::route('/'),
            // 'create' => Pages\CreatePresensi::route('/create'),
            // 'edit' => Pages\EditPresensi::route('/{record}/edit'),
        ];
    }
}
