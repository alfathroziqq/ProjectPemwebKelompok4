<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kartu_keluarga_id',
        'alamat',
        'luas_rumah',
        'jumlah_kamar',
        'spesifikasi_rumah',
    ];

    public function kartuKeluarga()
    {
        return $this->belongsTo(KartuKeluarga::class);
    }

    public function riwayatPerubahanRumahs()
    {
        return $this->hasMany(RiwayatPerubahanRumah::class);
    }
}
