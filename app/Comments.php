<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'message', 'daily_book_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyBook()
    {
        return $this->belongsTo(DailyBook::class);
    }
}
