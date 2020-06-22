<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttribute extends Model
{
    protected $fillable = [
        'avatar', 'description', 'wallpaper'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatarAttribute($value)
    {
        return asset($value ?: 'avatars/default_avatar.jpg');
    }

    public function getWallpaperAttribute($value)
    {
        return asset($value ?: 'https://picsum.photos/id/10/700/300?blur=2');
    }
}
