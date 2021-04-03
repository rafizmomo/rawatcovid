<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DampakCovid extends Model
{
    protected $table = 'dampak_covid';

    protected $fillable = [
        'title',
        'slug',
        'gambar',
        'keterangan',
        'user_id'
    ];
}
