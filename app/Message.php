<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id', 'id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }
}
