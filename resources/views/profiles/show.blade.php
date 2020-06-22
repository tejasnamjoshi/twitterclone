<x-app>
    <header class="mb-4">
        <div class="position-relative">
            <img class="position-absolute rounded-circle "
                style="bottom: 0px; left: 50%; transform: translateX(-50%) translateY(50%)"
                src="{{ $user->attrs->avatar }}" width="120px" height="120px" alt="">

            <img src="{{ $user->attrs->wallpaper }}" alt="" width="700" height="300">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <div style="max-width: 300px">
                <h4> <strong>{{ $user->name }}</strong> </h4>
                <p class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="d-flex">
                <div>
                    @can('edit', $user)
                    <a href="{{ current_user()->path('edit') }}">
                        <button class="btn btn-outline-secondary rounded-pill mr-2">
                            Edit profile
                        </button> </a>
                    @endcan
                </div>

                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>

        <p>
            <small>
                {{ $user->attrs->description }}
            </small>
        </p>
    </header>

    @include('timeline', ['tweets' => $tweets])
</x-app>