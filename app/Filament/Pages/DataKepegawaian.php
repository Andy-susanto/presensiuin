<?php

namespace App\Filament\Pages;

use App\Models\Pegawai;
use Filament\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Exception;

class DataKepegawaian extends Page implements HasForms
{
    use InteractsWithForms;
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    public $data;
    protected Pegawai $pegawai;
    protected static string $view = 'filament.pages.data-kepegawaian';

    public static function shouldRegisterNavigation(): bool
    {
        $akses = false;
        if(auth()->user()->can('page_DataKepegawaian') && !in_array('super_admin',auth()->user()->getRoleNames()->toArray())){
            $akses = true;
        }
        return $akses;
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Kepegawaian';
    }

    public function mount()
    {
        abort_unless(!in_array('super_admin',auth()->user()->getRoleNames()->toArray()),403);
        abort_unless(auth()->user()->can('page_DataKepegawaian'), 403);
        $this->pegawai = Pegawai::where('id', auth()->user()->pegawai_id)->first() ?? new Pegawai();
        $this->form->fill([
            'nama_pegawai' => $this->pegawai->nama_pegawai,
            'gelar_depan' => $this->pegawai->gelar_depan,
            'gelar_belakang' => $this->pegawai->gelar_belakang,
            'nip' => $this->pegawai->nip,
            'unit_kerjas_id' => $this->pegawai?->unit_kerjas_id,
            'status_kerjas_id' => $this->pegawai->status_kerjas_id,
            'pangkat_golongans_id' => $this->pegawai->pangkat_golongans_id,
            'tmt_sk' => $this->pegawai->tmt_sk,
            'status_kepegawaians_id' => $this->pegawai->status_kepegawaians_id,
            'jabatans_id' => $this->pegawai->jabatans_id,
            'jenjang_pendidikans_id' => $this->pegawai->jenjang_pendidikans_id,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(3)
                ->schema([
                    TextInput::make('gelar_depan')->placeholder('Gelar Depan'),
                    TextInput::make('nama_pegawai')->placeholder('Nama Pegawai'),
                    TextInput::make('gelar_belakang')->placeholder('Gelar Belakang'),
                ]),
            Grid::make(1)
                ->schema([
                    TextInput::make('nip')->label('NIP')->placeholder('NIP'),
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('unit_kerjas_id')->relationship('UnitKerja', 'nama_unit_kerja')->preload()->searchable()
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('status_kerjas_id')->relationship('StatusKerja', 'nama')->preload()->searchable()
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('pangkat_golongans_id')->relationship('PangkatGolongan', 'nama')->preload()->searchable()
                ]),
            Grid::make(1)
                ->schema([
                    DatePicker::make('tmt_sk')->label('TMT SK')->closeOnDateSelection()
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('status_kepegawaians_id')->relationship('StatusKepegawaian', 'nama')->preload()->searchable()
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('jabatans_id')->relationship('Jabatan', 'nama')->preload()->searchable()
                ]),
            Grid::make(1)
                ->schema([
                    Select::make('jenjang_pendidikans_id')->relationship('JenjangPendidikan', 'nama')->preload()->searchable()
                ]),
        ];
    }

    public function submit()
    {
        if (auth()->user()->pegawai_id) {
            $data = $this->form->getState();
            Pegawai::updateOrCreate(
                ['id' => auth()->user()->pegawai_id],
                $data
            );
            Notification::make()
                ->success()
                ->title('Data Kepegawaian di perbaharui !')
                ->body('Data anda telah di perbaharui')
                ->send();
        } else {
            Notification::make()
                ->danger()
                ->title('Tidak dapat Mengubah Biodata !')
                ->body('Anda tidak terdaftar sebagai pegawai. Silahkan hubungi admin')
                ->send();
        }
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormModel(): Model|string|null
    {
        return Pegawai::where('id', auth()->user()->pegawai_id)->first();
    }
}
