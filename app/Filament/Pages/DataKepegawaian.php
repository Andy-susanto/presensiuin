<?php

namespace App\Filament\Pages;

use App\Models\Pegawai;
use Filament\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;

class DataKepegawaian extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public $data;
    protected Pegawai $pegawai;
    protected static string $view = 'filament.pages.data-kepegawaian';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('page_DataKepegawaian');
    }

    protected static function getNavigationGroup(): ?string
    {
        return 'Kepegawaian';
    }

    public function mount()
    {
        abort_unless(auth()->user()->can('page_DataKepegawaian'), 403);
        $this->pegawai = Pegawai::where('id', auth()->user()->pegawai_id)->first() ?? new Pegawai();
        $this->form->fill([
            'nama_pegawai' => $this->pegawai->nama_pegawai,
            'gelar_depan' => $this->pegawai->gelar_depan,
            'gelar_belakang' => $this->pegawai->gelar_belakang,
            'nip' => $this->pegawai->nip,
            'jenis_no_induk' => $this->pegawai->jenis_no_induk,
            'tanggal_masuk' => $this->pegawai->tanggal_masuk,
            'unit_kerjas_id' => $this->pegawai->unit_kerjas_id,
            'status_kerjas_id' => $this->pegawai->status_kerjas_id,
            'tmt_sk' => $this->pegawai->tmt_sk,
            'status_kepegawaians_id' => $this->pegawai->status_kepegawaians_id
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
                ])
        ];
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
