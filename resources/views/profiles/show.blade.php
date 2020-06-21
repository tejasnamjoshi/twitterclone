<x-app>
    <header class="mb-4">
        <div class="position-relative">
            <img class="position-absolute rounded-circle "
                style="bottom: 0px; left: 50%; transform: translateX(-50%) translateY(50%)" src="{{ $user->avatar }}"
                width="120px" height="120px" alt="">

            <img src="https://picsum.photos/id/10/700/300?blur=2" alt="">
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
                Batman is a fictional superhero appearing in American comic books published by DC Comics. The character
                was
                created by artist Bob Kane and writer Bill Finger, and first appeared in Detective Comics #27 in 1939.
                Originally named the "Bat-Man," the character is also referred to by such epithets as the Caped
                Crusader,
                the Dark Knight, and the World's Greatest Detective.
            </small>
        </p>
    </header>

    @include('timeline', ['tweets' => $tweets])
</x-app>