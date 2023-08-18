<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use Uuid;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['nama_lengkap'];

    protected function namaLengkap(): Attribute
    {
        return new Attribute(
            get: fn () => $this->nama_lengkap(),
        );
    }

    public static function idWithNama()
    {
        return self::select('nama_lengkap', 'nama_pegawai', 'gelar_depan', 'gelar_belakang', 'id')->orderBy('nama_pegawai', 'asc')->get();
    }

    public function nama_lengkap()
    {
        return (isset($this->gelar_depan) ? $this->gelar_depan . '. '  : '') . ' ' . $this->nama_pegawai . (isset($this->gelar_belakang) ? ', ' . $this->gelar_belakang : '');
    }


    public function UnitKerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerjas_id');
    }

    public function StatusKerja()
    {
        return $this->belongsTo(StatusKerja::class, 'status_kerjas_id');
    }

    public function StatusKepegawaian()
    {
        return $this->belongsTo(StatusKepegawaian::class, 'status_kepegawaians_id');
    }

    public function PangkatGolongan()
    {
        return $this->belongsTo(PangkatGolongan::class, 'pangkat_golongans_id');
    }

    public function StatusKeaktifanPegawai()
    {
        return $this->belongsTo(StatusKeaktifanPegawai::class, 'status_keaktifan_pegawais_id');
    }

    public function Jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatans_id');
    }
    public function JenjangPendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class, 'jenjang_pendidikans_id');
    }
}
