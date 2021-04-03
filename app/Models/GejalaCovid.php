<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GejalaCovid extends Model
{
    protected $table = 'gejala_covid';

    protected $fillable = [
        'gejala',
        'pertanyaan',
        'bobot',
        'user_id'
    ];

    public function revise_covid()
    {
        return $this->hasMany(ReviseCovid::class);
    }
}
