<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('chats.chatlist', [
            'chatlist' => current_user()->chatlist()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $messages = current_user()->messages($user);
        return view('chats.chat', [
            'messages' => $messages,
            'recipient' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user)
    {
        $attributes = $this->validateParams();
        current_user()->sendMessage($user, $attributes['messageText']);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    private function validateParams()
    {
        return request()->validate([
            'messageText' => 'required|string|min:1|max:250'
        ]);
    }
}
