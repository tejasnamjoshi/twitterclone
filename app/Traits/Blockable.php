<?php

namespace App\Traits;

use App\Block;
use App\User;

trait Blockable
{
    public function blocks()
    {
        return $this->belongsToMany(User::class, 'blocks', 'user_id', 'blocked_user_id');
    }

    public function blocked()
    {
        return $this->belongsToMany(User::class, 'blocks', 'blocked_user_id', 'user_id');
    }

    public function block(User $user)
    {
        $this->blocks()->save($user);
    }

    public function unblock(User $user)
    {
        $this->blocks()->detach($user);
    }

    public function toggleBlock(User $user)
    {
        if ($this->isBlocked($user)) {
            return $this->unblock($user);
        }

        return $this->block($user);
    }

    public function isBlocked(User $user)
    {
        return $this->blocks()->where('blocked_user_id', $user->id)->exists();
    }
}
