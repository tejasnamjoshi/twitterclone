<?php

namespace App;

use App\Traits\Followable;
use App\Traits\Blockable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable, Blockable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['attrs'];

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $friends)
            ->orWhere(['user_id' => $this->id])
            ->withLikes()
            ->latest()
            ->paginate(5);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function attrs()
    {
        return $this->hasOne(UserAttribute::class);
    }

    public function makeAdmin($isAdmin = true)
    {
        $this->attrs()->update(compact('isAdmin'));
    }

    public function removeAdmin()
    {
        $this->makeAdmin(false);
    }

    public function toggleAdmin()
    {
        $this->attrs->isAdmin ? $this->removeAdmin() : $this->makeAdmin();
    }

    public function messages(User $user)
    {
        $friendId = $user->id;
        return Message::where(function ($query) use ($friendId) {
            $query->where('from_user_id', $this->id)
            ->where('to_user_id', $friendId);
        })
        ->orWhere(function ($query) use ($friendId) {
            $query->where('to_user_id', $this->id)
            ->where('from_user_id', $friendId);
        })
        ->with('sender')
        ->with('recipient')
        ->get()
        ->sortBy('created_at');
    }

    public function sendMessage(User $toUser, $messageText)
    {
        $message = [
            'from_user_id' => $this->id,
            'to_user_id' => $toUser->id,
            'messageText' => $messageText,
        ];
        Message::create($message);
    }

    /*
    TODO Refactor to make code efficient */
    public function chatlist()
    {
        $chatlist = [];
        $messages = Message::where('to_user_id', $this->id)
        ->orWhere('from_user_id', $this->id)
        ->latest()
        ->get();

        $messages->map(function ($message) use (&$chatlist) {
            $id = $message->from_user_id === $this->id ? $message->to_user_id : $message->from_user_id;

            if (empty($chatlist[$id])) {
                $chatlist[$id] = [
                    'user' => User::find($id),
                    'messageText' => $message->messageText
                ];
            }
        });

        return array_values($chatlist);
    }
}
