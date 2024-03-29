<?php

namespace App\Traits;

use App\User;

trait Followable
{
    public function follow(User $user)
    {
        $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        $this->follows()->toggle($user);
        // if ($this->following($user)) {
        //     return $this->unfollow($user);
        // }
        // return $this->follow($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function following($user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id');
    }
}
