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
        'student_id', 'jenis_tagihan', 'jumlah_tagihan', 'status', 'total_tagihan', 'bukti_pembayaran'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
