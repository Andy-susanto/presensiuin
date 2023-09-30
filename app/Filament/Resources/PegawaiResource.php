<?php

namespace App\Filament\Resources;

use App\Events\BuatAkun;
use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use App\Filament\Resources\PegawaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use Illuminate\Database\Eloquent\Collection;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Pegawai';

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
                        Forms\Components\TextInput::make('nama_pegawai')->required(),

                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('gelar_depan'),
                        Forms\Components\TextInput::make('gelar_belakang'),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('jenis_no_induk')->options([
                            'nip' => 'NIP',
                            'nik' => 'NIK',
                            'NIDN' => 'NIDN'
                        ])->required(),
                        Forms\Components\TextInput::make('nip')->required(),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\DatePicker::make('tanggal_masuk')->required()->closeOnDateSelection(),
                        Forms\Components\DatePicker::make('tanggal_keluar')->closeOnDateSelection(),
                    ]),
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('unit_kerjas_id')->relationship('UnitKerja', 'nama_unit_kerja')->preload()->searchable()->required(),
                        Forms\Components\Select::make('status_kepegawaians_id')->relationship('StatusKepegawaian', 'nama')->preload()->searchable()->required(),
                        Forms\Components\Select::make('status_kerjas_id')->relationship('StatusKerja', 'nama')->preload()->searchable()->required(),
                        Forms\Components\Select::make('pangkat_golongans_id')->relationship('PangkatGolongan', 'nama')->preload()->searchable()->required(),
                        Forms\Components\Select::make('status_keaktifan_pegawais_id')->relationship('StatusKeaktifanPegawai', 'nama')->preload()->searchable()->required(),
                        Forms\Components\Select::make('jabatans_id')->relationship('Jabatan', 'nama')->preload()->searchable(),
                        Forms\Components\Select::make('jenjang_pendidikans_id')->relationship('JenjangPendidikan', 'nama')->preload()->searchable()->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(['nama_pegawai']),
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\BadgeColumn::make('jenis_no_induk')->colors([
                    'warning' => 'nip',
                    'success' => 'nidn',
                    'primary' => 'nik',
                ]),
                Tables\Columns\TextColumn::make('tanggal_masuk')->date(),
                Tables\Columns\TextColumn::make('tanggal_keluar')->date(),
                Tables\Columns\TextColumn::make('UnitKerja.nama_unit_kerja')->label('Unit Kerja')->searchable(),
                Tables\Columns\TextColumn::make('StatusKepegawaian.nama')->searchable(),
                Tables\Columns\TextColumn::make('StatusKerja.nama')->searchable(),
                Tables\Columns\TextColumn::make('PangkatGolongan.nama')->searchable(),
                Tables\Columns\TextColumn::make('StatusKeaktifanPegawai.nama')->searchable(),
                Tables\Columns\TextColumn::make('Jabatan.nama')->searchable(),
                Tables\Columns\TextColumn::make('JenjangPendidikan.nama')->searchable(),
            ])
            ->filters(
                [
                    Tables\Filters\SelectFilter::make('unit_kerjas_id')->label('Unit Kerja ')->relationship('UnitKerja', 'nama_unit_kerja')->searchable()->columnSpan(2),
                    Tables\Filters\SelectFilter::make('status_kepegawaians_id')->label('Status Kepegawaian')->relationship('StatusKepegawaian', 'nama')->searchable()->columnSpan(2),
                    Tables\Filters\SelectFilter::make('status_kerjas_id')->label('Status Kerja')->relationship('StatusKerja', 'nama')->searchable()->columnSpan(1),
                    Tables\Filters\SelectFilter::make('pangkat_golongans_id')->label('Pangkat Golongan')->relationship('PangkatGolongan', 'nama')->searchable()->columnSpan(2),
                    Tables\Filters\SelectFilter::make('jabatans_id')->label('Jabatan')->relationship('Jabatan', 'nama')->searchable()->columnSpan(2),
                    Tables\Filters\SelectFilter::make('status_keaktifan_pegawais_id')->label('Status Keaktifan Pegawai')->relationship('StatusKeaktifanPegawai', 'nama')->searchable()->columnSpan(1),
                    Tables\Filters\SelectFilter::make('jenjang_pendidikans_id')->label('Jenjang Pendidikan')->relationship('JenjangPendidikan', 'nama')->searchable()->columnSpan(1),
                ],
                layout: Layout::AboveContent,
            )
            ->actions([
                Tables\Actions\Action::make('create_user')
                    ->label('Buat Akun')
                    ->url(fn (Pegawai $record): string => route('users.create.akun', $record)),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('buat_akun')
                    ->label('Buat Akun')
                    ->action(function (Collection $records) {
                        $records->each(function ($record) {
                            event(new BuatAkun($record));
                        });
                    })
                    ->requiresConfirmation()
                    ->deselectRecordsAfterCompletion(),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePegawais::route('/'),
        ];
    }
}
