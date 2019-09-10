<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'nama_lengkap', 'nama_panggilan', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'usia', 'agama', 'alamat_rumah',
        'telepon_rumah', 'anak_ke', 'catatan_medis', 'penyakit_berat',
        'keadaan_khusus', 'sifat_baik', 'sifat_diperhatikan', 'kelas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyBook()
    {
        return $this->hasMany(DailyBook::class);
    }
    
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class);
    }
}
