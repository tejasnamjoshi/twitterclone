<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->attrs->isAdmin) {
            return true;
        }
    }

    public function edit(User $currentUser, User $user)
    {
        return $currentUser->is($user);
    }

    public function update(User $user)
    {
        return $user->attrs->isAdmin;
    }
}
