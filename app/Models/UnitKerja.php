<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use Uuid;
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $fillable = [
        'nama_unit_kerja',
        'lokasi',
        'kategori_unit_kerjas_id'
    ];

    public function KategoriUnitKerja()
    {
        return $this->belongsTo(KategoriUnitKerja::class, 'kategori_unit_kerjas_id');
    }
}
