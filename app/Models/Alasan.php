<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alasan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alasan';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pegawai_id','jenis_alasan_id','file','tanggal_mulai','tanggal_selesai','status'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id');
    }
}
