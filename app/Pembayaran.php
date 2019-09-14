<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    //
    protected $table = 'pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id', 'kelas', 'jenis_tagihan', 'bulan_tagihan', 'jumlah_tagihan', 'deskripsi', 'status', 'bukti_pembayaran'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
