<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use Uuid;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'bobot_sks', 'aktif', 'keterangan', 'jenis_jabatans_id'];

    public function JenisJabatan()
    {
        return $this->belongsTo(JenisJabatan::class, 'jenis_jabatans_id');
    }
}
