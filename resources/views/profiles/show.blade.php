<x-app>
    <header class="mb-4">
        <div class="position-relative">
            <img class="position-absolute rounded-circle "
                style="bottom: 0px; left: 10%; transform: translateX(-50%) translateY(50%)"
                src="{{ $user->attrs->avatar }}" width="120px" height="120px" alt="">

            <img src="{{ $user->attrs->wallpaper }}" alt="" width="700" height="300">
        </div>

        <div class="d-flex flex-column mt-3">
            <div class="d-flex justify-content-end py-2">
                <div class="px-2">
                    @can('edit', $user)
                    <a href="{{ $user->path('edit') }}">
                        <button class="btn btn-outline-secondary rounded-pill">
                            Edit profile
                        </button> </a>
                    @endcan
                </div>

                @can('update', $user)
                <div class="px-2">
                    <x-make-admin :user="$user" />
                </div>
                @endcan

                <div class="px-2">
                    <x-follow-button :user="$user" />
                </div>
            </div>
        </div>

        <div class="ml-2" style="max-width: 300px">
            <h4> <strong>{{ $user->name }}</strong> </h4>
            <p class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>

        <p>
            <small>
                {{ $user->attrs->description }}
            </small>
        </p>
    </header>

    @include('timeline', ['tweets' => $tweets])
</x-app>