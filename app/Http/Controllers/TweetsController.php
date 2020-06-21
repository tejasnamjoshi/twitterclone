<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => current_user()->timeline()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);

        if (!empty(request('body'))) {
            Tweet::create([
                'user_id' => auth()->id(),
                'body' => $attributes['body']
            ]);
        }

        return redirect(route('home'));
    }

    public function like(Tweet $tweet)
    {
        $tweet->like();
        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->dislike();
        return back();
    }
}
