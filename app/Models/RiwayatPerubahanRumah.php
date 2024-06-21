<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPerubahanRumah extends Model
{
    protected $fillable =
    [
        'rumah_id',
        'perubahan',
        'tanggal_perubahan'
    ];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
