<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_provinsi'];

    public function kartuKeluargas()
    {
        return $this->hasMany(KartuKeluarga::class);
    }
}
