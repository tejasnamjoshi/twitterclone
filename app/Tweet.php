<?php

namespace App;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Likable;
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
