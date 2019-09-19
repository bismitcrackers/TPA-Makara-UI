<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender', 'content', 'redirect_url', 'is_read'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
