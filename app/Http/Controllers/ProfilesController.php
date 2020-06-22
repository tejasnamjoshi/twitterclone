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
        $userAttrs = ['avatar', 'description', 'wallpaper'];
        $userAttrsValues = [];

        $attributes = $request->validated();

        foreach ($userAttrs as $attr) {
            if (isset($attributes[$attr])) {
                $userAttrsValues[$attr] = $attributes[$attr];
                unset($attributes[$attr]);
            }
        }

        if ($attributes['password'] === null) {
            unset($attributes['password']);
        }

        $user->update($attributes);

        if (!empty($userAttrsValues)) {
            if (!empty($userAttrsValues['avatar'])) {
                $avatarFile = request('avatar');
                $userAttrsValues['avatar'] = $avatarFile->storeAs('avatars', $user->username . '_avatar.' . $avatarFile->extension());
            }

            if (!empty($userAttrsValues['wallpaper'])) {
                $wallpaperFile = request('wallpaper');
                $userAttrsValues['wallpaper'] = $wallpaperFile->storeAs('wallpapers', $user->username . '_wallpaper.' . $wallpaperFile->extension());
            }

            $user->attrs()->update($userAttrsValues);
        }

        return redirect($user->path());
    }
}
