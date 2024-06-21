<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanRumah extends Model
{
    use HasFactory;

    protected $fillable = [
        'rumah_id',
        'deskripsi',
        'tanggal_laporan',
    ];

    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}
