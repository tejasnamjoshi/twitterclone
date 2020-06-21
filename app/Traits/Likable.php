<?php

namespace App\Traits;

use App\Like;
use App\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $like = true)
    {
        $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : current_user()->id
            ],
            [
                'liked' => $like
            ]
        );
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLiked(User $user, $liked = true)
    {
        // $this->likes()->where(['user_id' => $user->id, 'liked' => true])->exists(); // N+1
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', $liked)
            ->count();
    }

    public function isDisliked(User $user)
    {
        return $this->isLiked($user, false);
    }

    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'SELECT tweet_id, SUM(liked) likes, SUM(!liked) dislikes from likes
            GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }
}
