<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Alasan;
use App\Models\Biodata;
use App\Models\HariKerja;
use App\Models\Jabatan;
use App\Models\JabatanFungsional;
use App\Models\JabatanKemenag;
use App\Models\Jabfung;
use App\Models\JenisJabatan;
use App\Models\JenisUnitKerja;
use App\Models\KategoriUnitKerja;
use App\Models\LevelJabatanKemenag;
use App\Models\PangkatGolongan;
use App\Models\Presensi;
use App\Models\SatkerKemenag;
use App\Models\StatusKeaktifanPegawai;
use App\Models\StatusKepegawaian;
use App\Models\StatusKerja;
use App\Models\User;
use App\Models\WaktuPresensi;
use App\Policies\AlasanPolicy;
use App\Policies\BiodataPolicy;
use App\Policies\FirewallPolicy;
use App\Policies\JabatanFungsionalPolicy;
use App\Policies\JabatanKemengaPolicy;
use App\Policies\JabatanPolicy;
use App\Policies\JenisJabatanPolicy;
use App\Policies\JenisUnitKerjaPolicy;
use App\Policies\JenjangPendidikanPolicy;
use App\Policies\KategoriUnitKerjaPolicy;
use App\Policies\LevelJabatanKemenagPolicy;
use App\Policies\LiburPolicy;
use App\Policies\PangkatGolonganPolicy;
use App\Policies\PangkatKemenagPolicy;
use App\Policies\PegawaiPolicy;
use App\Policies\PresensiPolicy;
use App\Policies\SatkerKemenagPolicy;
use App\Policies\StatusKeaktifanPegawaiPolicy;
use App\Policies\StatusKepegawaianPolicy;
use App\Policies\StatusKerjaPolicy;
use App\Policies\UserPolicy;
use App\Policies\WaktuPresensiPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use SolutionForest\FilamentFirewall\Models\Ip;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'Spatie\Permission\Models\Role'       => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'App\Policies\PermissionPolicy',
        'Spatie\Activitylog\Models\Activity'  => 'App\Policies\ActivityPolicy',

        User::class                          => UserPolicy::class,
        Ip::class                            => FirewallPolicy::class,
        // Biodata::class                       => BiodataPolicy::class,
        JabatanKemenag::class               => JabatanKemengaPolicy::class,
        Jabatan::class                      => JabatanPolicy::class,
        Jabfung::class            => JabatanFungsionalPolicy::class,
        JenisJabatan::class                 => JenisJabatanPolicy::class,
        JenisUnitKerja::class               => JenisUnitKerjaPolicy::class,
        JenjangPendidikan::class            => JenjangPendidikanPolicy::class,
        KategoriUnitKerja::class            => KategoriUnitKerjaPolicy::class,
        Libur::class                        => LiburPolicy::class,
        PangkatGolongan::class              => PangkatGolonganPolicy::class,
        Pegawai::class                      => PegawaiPolicy::class,
        StatusKeaktifanPegawai::class => StatusKeaktifanPegawaiPolicy::class,
        StatusKepegawaian::class => StatusKepegawaianPolicy::class,
        StatusKerja::class => StatusKerjaPolicy::class,
        SatkerKemenag::class => SatkerKemenagPolicy::class,
        PangkatKemenag::class => PangkatKemenagPolicy::class,
        LevelJabatanKemenag::class => LevelJabatanKemenagPolicy::class,
        KategoriUnitKerja::class => KategoriUnitKerjaPolicy::class,
        WaktuPresensi::class => WaktuPresensiPolicy::class,
        Presensi::class => PresensiPolicy::class,
        Alasan::class => AlasanPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
