<?php

namespace App\Filament\Pages;

use App\Models\Biodata as ModelsBiodata;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\TemporaryUploadedFile;

class Biodata extends Page implements HasForms
{
    use InteractsWithForms;
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.biodata';

    protected ModelsBiodata $biodata;
    public $data;

    public static function getNavigationGroup(): ?string
    {
        return 'Kepegawaian';
    }

    public static function shouldRegisterNavigation(): bool
    {
        $akses = false;
        if(auth()->user()->can('page_Biodata') && !in_array('super_admin',auth()->user()->getRoleNames()->toArray())){
            $akses = true;
        }
        return $akses;
    }

    public function mount(): void
    {
        abort_unless(!in_array('super_admin',auth()->user()->getRoleNames()->toArray()), 403);
        abort_unless(auth()->user()->can('page_Biodata'), 403);
        $this->biodata = ModelsBiodata::where('pegawais_id', auth()->user()->pegawai_id)->first() ?? new ModelsBiodata();
        $this->form->fill([
            'pegawais_id'       => $this->biodata->pegawais_id,
            'tempat_lahir'      => $this->biodata->tempat_lahir,
            'tanggal_lahir'     => $this->biodata->tanggal_lahir,
            'jenis_kelamin'     => $this->biodata->jenis_kelamin,
            'gol_darah'         => $this->biodata->gol_darah,
            'rt'                => $this->biodata->rt,
            'rw'                => $this->biodata->rw,
            'blok'              => $this->biodata->blok,
            'no_rumah'          => $this->biodata->no_rumah,
            'kode_pos'          => $this->biodata->kode_pos,
            'alamat_di_jambi'   => $this->biodata->alamat_di_jambi,
            'kode_pos_di_jambi' => $this->biodata->kode_pos_di_jambi,
            'email'             => $this->biodata->email,
            'no_hp'             => $this->biodata->no_hp,
            'website'           => $this->biodata->website,
            'file_ktp'          => $this->biodata->file_ktp,
            'file_foto'         => $this->biodata->file_foto,
            'no_ktp'            => $this->biodata->no_ktp,
            'agama'             => $this->biodata->agama,
            'npwp'              => $this->biodata->npwp,
            'file_npwp'         => $this->biodata->file_npwp,
            'file_karpeg'       => $this->biodata->file_karpeg,
            'alamat_asal'       => $this->biodata->alamat_asal,
            'no_rekening'       => $this->biodata->no_rekening,
            'file_rekening'     => $this->biodata->file_rekening,
            'nama_desa_asal'    => $this->biodata->nama_desa_asal,
            'nama_rekening'     => $this->biodata->nama_rekening,
            'id_sinta'          => $this->biodata->id_sinta,
            'id_scopus'         => $this->biodata->id_scopus,
            'id_google_scholar' => $this->biodata->id_google_scholar,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Tabs::make('heading')
                ->tabs([
                    Tab::make('Identitas Diri')
                        ->schema([
                            Grid::make(1)
                                ->schema([
                                    FileUpload::make('file_foto')->label('File Foto')->maxSize(1000)
                                        ->image()
                                        ->imagePreviewHeight('250')
                                        ->loadingIndicatorPosition('left')
                                        ->panelAspectRatio('4:1')
                                        ->panelLayout('integrated')
                                        ->removeUploadedFileButtonPosition('right')
                                        ->uploadButtonPosition('left')
                                        ->uploadProgressIndicatorPosition('left')
                                        ->enableDownload()
                                        ->enableOpen()
                                        ->directory(auth()->user()->pegawai->nama_pegawai ?? 'admin')
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string) str((auth()->user()->pegawai->nama_lengkap ?? ('user' . rand())) . '.' . $file->getClientOriginalExtension())->prepend('pas-foto-');
                                        })
                                ]),
                            Grid::make(2)
                                ->schema([
                                    TextInput::make('tempat_lahir')->placeholder('Tempat Lahir'),
                                    DatePicker::make('tanggal_lahir')->closeOnDateSelection(),
                                    TextInput::make('no_ktp')->label('No KTP'),
                                    TextInput::make('npwp'),
                                ]),
                            Grid::make(1)
                                ->schema([
                                    Select::make('agama')->options([
                                        'islam'     => 'Islam',
                                        'katolik'   => 'Katolik',
                                        'hindu'     => 'Hindu',
                                        'budha'     => 'Budha',
                                        'protestan' => 'Protestan',
                                        'konghucu' => 'Konghucu',
                                    ])
                                ]),
                            Grid::make(1)
                                ->schema([
                                    Radio::make('jenis_kelamin')->options([
                                        'lk' => 'Laki-Laki',
                                        'p' => 'Perempuan',
                                    ])
                                ]),
                        ]),
                    Tab::make('Alamat')
                        ->schema([
                            Grid::make(5)
                                ->schema([
                                    TextInput::make('rt')->numeric(),
                                    TextInput::make('rw')->numeric(),
                                    TextInput::make('blok'),
                                    TextInput::make('no_rumah')->numeric(),
                                    TextInput::make('kode_pos')->numeric(),
                                ]),
                            Grid::make(1)
                                ->schema([
                                    Textarea::make('alamat_di_jambi')->label('Alamat di Jambi'),
                                    Textarea::make('alamat_asal')->label('Alamat Asal'),
                                    Textarea::make('nama_desa_asal')->label('Nama Desa Asal'),
                                ]),
                            Grid::make(3)
                                ->schema([
                                    TextInput::make('kode_pos_di_jambi')->label('Kode Pos di Jambi')->numeric(),
                                    TextInput::make('email')->email(),
                                    TextInput::make('no_hp')->label('No Hp')->tel()
                                ]),
                        ]),
                    Tab::make('Data Pendukung')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    TextInput::make('website'),
                                    TextInput::make('no_rekening')->label('No Rekening BSI ( Bank Syariah Indonesia)'),
                                    TextInput::make('nama_rekening')->placeholder('BSI (Bank Syariah Indonesia)')->default('BSI')->disabled(),
                                ]),
                            Grid::make(2)
                                ->schema([
                                    FileUpload::make('file_ktp')->maxSize(1000)
                                        ->label('Foto KTP')
                                        ->image()
                                        ->imagePreviewHeight('250')
                                        ->loadingIndicatorPosition('left')
                                        ->panelAspectRatio('4:1')
                                        ->panelLayout('integrated')
                                        ->removeUploadedFileButtonPosition('right')
                                        ->uploadButtonPosition('left')
                                        ->uploadProgressIndicatorPosition('left')
                                        ->enableDownload()
                                        ->enableOpen()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string) str((auth()->user()->pegawai->nama_lengkap ?? ('user' . rand())) . '.' . $file->getClientOriginalExtension())->prepend('file-ktp-');
                                        }),
                                    FileUpload::make('file_npwp')->maxSize(1000)->image()
                                        ->label('Foto NPWP')
                                        ->imagePreviewHeight('250')
                                        ->loadingIndicatorPosition('left')
                                        ->panelAspectRatio('4:1')
                                        ->panelLayout('integrated')
                                        ->removeUploadedFileButtonPosition('right')
                                        ->uploadButtonPosition('left')
                                        ->uploadProgressIndicatorPosition('left')
                                        ->enableDownload()
                                        ->enableOpen()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string) str((auth()->user()->pegawai->nama_lengkap ?? ('user' . rand())) . '.' . $file->getClientOriginalExtension())->prepend('file-npwp-');
                                        }),
                                    FileUpload::make('file_karpeg')->maxSize(1000)->image()
                                        ->label('Foto Kartu Pegawai')
                                        ->imagePreviewHeight('250')
                                        ->loadingIndicatorPosition('left')
                                        ->panelAspectRatio('4:1')
                                        ->panelLayout('integrated')
                                        ->removeUploadedFileButtonPosition('right')
                                        ->uploadButtonPosition('left')
                                        ->uploadProgressIndicatorPosition('left')
                                        ->enableDownload()
                                        ->enableOpen()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string) str((auth()->user()->pegawai->nama_lengkap ?? ('user' . rand())) . '.' . $file->getClientOriginalExtension())->prepend('file-karpeg-');
                                        }),
                                    FileUpload::make('file_rekening')->maxSize(1000)
                                        ->label('Foto Buku Tabungan')
                                        ->image()
                                        ->imagePreviewHeight('250')
                                        ->loadingIndicatorPosition('left')
                                        ->panelAspectRatio('4:1')
                                        ->panelLayout('integrated')
                                        ->removeUploadedFileButtonPosition('right')
                                        ->uploadButtonPosition('left')
                                        ->uploadProgressIndicatorPosition('left')
                                        ->enableDownload()
                                        ->enableOpen()
                                        ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                            return (string) str((auth()->user()->pegawai->nama_lengkap ?? ('user' . rand())) . '.' . $file->getClientOriginalExtension())->prepend('file-rekening-');
                                        }),
                                ])
                        ]),
                    Tab::make('Data Penelitian')
                        ->schema([
                            Grid::make(3)
                                ->schema([
                                    TextInput::make('id_sinta'),
                                    TextInput::make('id_scopus'),
                                    TextInput::make('id_google_scholar'),
                                ])
                        ])
                ])
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function submit()
    {
        if (auth()->user()->pegawai_id) {
            $data = $this->form->getState();
            ModelsBiodata::updateOrCreate(
                ['pegawais_id' => auth()->user()->pegawai_id],
                $data
            );
            Notification::make()
                ->success()
                ->title('Biodata di perbaharui !')
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

    protected function getFormModel(): Model|string|null
    {
        return ModelsBiodata::where('pegawais_id', auth()->user()->pegawai_id)->first();
    }
}
