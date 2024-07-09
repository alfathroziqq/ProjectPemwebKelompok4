<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Monitoring extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provinsi',
        'latitude',
        'longitude',
        'deskripsi',
        'rumah_sehat',
        'rumah_tidak_sehat',
        'rumah_tidak_layak',
    ];

    /**
     * Get a truncated version of the description.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function DescriptionLimit(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::words($attributes['deskripsi'], 10, ' ...'),
        );
    }
}
