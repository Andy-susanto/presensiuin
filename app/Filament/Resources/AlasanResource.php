<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlasanResource\Pages;
use App\Filament\Resources\AlasanResource\RelationManagers;
use App\Models\Alasan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class AlasanResource extends Resource
{
    protected static ?string $model = Alasan::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-right-on-rectangle';

    public static function getNavigationGroup(): ?string
    {
        return 'Kepegawaian';
    }

    public static function shouldRegisterNavigation(): bool
    {
        $akses = false;
        if (!in_array('super_admin',auth()->user()->getRoleNames()->toArray())) {
            $akses = true;
        }

        return $akses;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis_alasan')
                    ->options([
                        'tb' => 'Tugas Belajar',
                        'cuti' => 'Cuti',
                        'sakit' => 'Sakit',
                        'izin' => 'Izin',
                        'dl' => 'Dinas Luar',
                    ])
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\FileUpload::make('file')
                    ->helperText('File yang di upload berbentuk *pdf')
                    ->columnSpanFull()
                    ->maxSize(1024)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_mulai')->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')->afterOrEqual('tanggal_mulai')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->where('pegawai_id',auth()->user()?->pegawai_id))
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nama_lengkap')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_alasan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListAlasans::route('/'),
            'create' => Pages\CreateAlasan::route('/create'),
            'edit' => Pages\EditAlasan::route('/{record}/edit'),
        ];
    }
}
