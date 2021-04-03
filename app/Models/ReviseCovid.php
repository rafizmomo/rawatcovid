<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviseCovid extends Model
{
    protected $table = 'tabel_revise';

    protected $fillable = [
        'kategori_gejala_id',
        'persentase_kecocokan'
    ];

    public function kasus_covid()
    {
        return $this->belongsToMany(GejalaCovid::class, 'kasus_covid');
    }


    public function kategori_gejala_covid()
    {
        return $this->belongsTo(KategoriGejalaCovid::class, 'kategori_gejala_id', 'id');
    }
}
