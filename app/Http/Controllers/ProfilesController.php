<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()
                ->withLikes()
                ->paginate(5)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, EditProfileRequest $request)
    {
        $attributes = $request->validated();

        if ($attributes['password'] === null) {
            unset($attributes['password']);
        }

        if (!empty($attributes['avatar'])) {
            $avatarFile = request('avatar');
            $attributes['avatar'] = $avatarFile->storeAs('avatars', $user->username . '_avatar.' . $avatarFile->extension());
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
