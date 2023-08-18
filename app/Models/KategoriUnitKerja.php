<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUnitKerja extends Model
{
    use Uuid;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama_kategori', 'jenis_unit_kerjas_id'];

    public function JenisUnitKerja()
    {
        return $this->belongsTo(JenisUnitKerja::class, 'jenis_unit_kerjas_id');
    }
}
