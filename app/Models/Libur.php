<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libur extends Model
{
    use Uuid;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
    ];
    protected $guarded = ['created_at', 'updated_at', 'id'];
}
