<?php

use App\User;

/**
 *
 */
trait Messagable
{
    public function messsages(User $user)
    {
        return $this->hasMany(User::class, 'from_user_id', 'id');
    }
}
