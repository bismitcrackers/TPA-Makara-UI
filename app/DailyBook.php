<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyBook extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'pembuat', 'tanggal', 'tema', 'subtema', 'snack',
        'keterangan_fisik', 'keterangan_kognitif', 'keterangan_sosial',
        'makan_siang', 'tidur_siang', 'catatan_khusus', 'kegiatan',
        'url_lampiran', 'kelas', 'dibaca'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function comments()
    {
        return $this->hasOne(Comments::class);
    }
}
