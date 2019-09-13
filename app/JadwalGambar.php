<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalGambar extends Model
{

    protected $table = 'jadwal_gambar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jadwal_id', 'url_lampiran'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

}
