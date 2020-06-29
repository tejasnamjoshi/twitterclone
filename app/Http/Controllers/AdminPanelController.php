<?php

namespace App\Http\Controllers;

use App\User;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin-panel');
    }

    public function edit(User $user)
    {
        $user->toggleAdmin();
        return back();
    }
}
