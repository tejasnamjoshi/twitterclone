<h3 class="font-weight-bold">Following</h3>

<ul class="p-0">
    @forelse (current_user()->follows as $user)

    @if (!current_user()->isBlocked($user))
    <li class="list-unstyled my-3">
        <a href="{{ $user->path() }}">
            <div class="d-flex align-items-center">
                <img width="50" height="50" class="rounded-circle mr-4" src="{{ $user->attrs->avatar }}" alt="ALT">
                {{ $user->name }}
            </div>
        </a>
    </li>
    @endif

    @empty
    <p>No Friends yet!!</p>

    @endforelse
</ul>