<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanKemenag extends Model
{
    use Uuid;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_jabatan',
        'jabatan',
        'tampil_jabatan',
        'usia_pensiun',
        'tunjangan',
        'grade',
    ];
}
