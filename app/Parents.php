<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{

    protected $table = 'parents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'peran', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir',
        'agama', 'pendidikan', 'jurusan', 'pekerjaan', 'telepon_kantor',
        'email', 'alamat_rumah', 'alamat_kantor', 'no_handphone', 'foto_ktp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
