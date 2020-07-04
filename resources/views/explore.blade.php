<x-app>
    <div>
        @foreach ($users as $user)
        <a class="d-flex align-items-center" href="{{ $user->path() }}">
            <img class="rounded-circle" src="{{ $user->attrs->avatar }}" width="60" height="60"
                alt="{{ $user->name }}'s avatar'">
            <div class="d-flex p-4">
                {{ $user->name }}
                @if (current_user()->isBlocked($user))
                <div class="text-danger pl-2">
                    (B)
                </div>
                @endif
            </div>
        </a>
        @endforeach
    </div>
</x-app>