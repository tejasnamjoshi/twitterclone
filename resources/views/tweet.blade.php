<div class="d-flex p-3 {{ $loop->last ? '' : 'border-bottom border-dark' }}">
    <div>
        <a href="{{ $tweet->user->path() }}">
            <img width="50" height="50" class="rounded-circle mr-4" src="{{ $tweet->user->avatar }}" alt="ALT">
        </a>
        <div class="text-muted mt-3" style="font-size: 0.55rem">
            {{ $tweet->created_at->diffForHumans() }}
        </div>
    </div>

    <div>
        <a href="{{ $tweet->user->path() }}">
            <h5 class="font-weight-bold mb-2">{{ $tweet->user->name }}</h5>
        </a>

        <p class="text-small">
            {{ $tweet->body }}
        </p>
        <div class="d-flex">
            <x-like-button :tweet="$tweet" />
            <x-dislike-button :tweet="$tweet" />
        </div>
    </div>
</div>