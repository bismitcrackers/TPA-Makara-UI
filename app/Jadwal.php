<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $table = 'jadwal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pembuat', 'url_lampiran', 'kelas'
    ];

}
