<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriGejalaCovid extends Model
{
    protected $table = 'kategori_gejala_covid';

    protected $fillable = [
        'kategori',
        'solusi'
    ];

    public function revise_covid()
    {
        return $this->hasMany(ReviseCovid::class);
    }
}
