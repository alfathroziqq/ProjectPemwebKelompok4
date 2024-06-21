<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_kk',
        'kepala_keluarga',
        'alamat',
        'wilayah_id',
    ];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function rumahs()
    {
        return $this->hasMany(Rumah::class);
    }
}
