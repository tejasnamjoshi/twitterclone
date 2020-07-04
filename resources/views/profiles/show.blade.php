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
                    <x-block-button :user="$user" />
                </div>
                @if (!current_user()->isBlocked($user))
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
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="ml-2" style="max-width: 300px">
                <h4> <strong>{{ $user->name }}</strong> </h4>
                <p class="text-muted">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="d-flex">
                <div class="mr-4">
                    <h6 style="color: rgb(136, 153, 166);">
                        Followed By
                    </h6>
                    <a href="/explore/{{ $user->username }}/followers">
                        <h4 class="text-center">
                            {{ $user->followers()->count() }}
                        </h4>
                    </a>
                </div>

                <div>
                    <h6 style="color: rgb(136, 153, 166);">
                        Following
                    </h6>
                    <a href="/explore/{{ $user->username }}/follows">
                        <h4 class="text-center">
                            {{ $user->follows()->count() }}
                        </h4>
                    </a>
                </div>
            </div>
        </div>

        <p>
            <small>
                {{ $user->attrs->description }}
            </small>
        </p>
    </header>

    @if (current_user()->isBlocked($user))
    <div class="text-center text-danger">
        <h2>Blocked</h2>
    </div>
    @else
    @include('timeline', ['tweets' => $tweets])
    @endif
</x-app>