<?php

namespace App\Http\Controllers;

use App\User;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = auth()->user() ? User::where('id', '!=', current_user()->id)->paginate(50) : User::paginate(50);

        return view('explore', compact('users'));
    }

    public function followers(User $user)
    {
        return view('explore', [
            'users' => $user->followers
        ]);
    }

    public function follows(User $user)
    {
        return view('explore', [
            'users' => $user->follows
        ]);
    }
}
