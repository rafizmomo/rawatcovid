<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasusCovid extends Model
{
    protected $table = 'kasus_covid';

    protected $fillable = [
        'revise_covid_id',
        'gejala_covid_id',

    ];

    public function revise_covid()
    {
        return $this->belongsTo(ReviseCovid::class, 'revise_covid_id', 'id');
    }

    public function gejala_covid()
    {
        return $this->belongsTo(GejalaCovid::class, 'gejala_covid_id', 'id');
    }
}
