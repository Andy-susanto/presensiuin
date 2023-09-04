<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use Uuid;
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'presensi';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pegawai_id', 'waktu_presensi_id', 'tanggal', 'waktu', 'foto', 'lat', 'long', 'ip', 'keterangan'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
