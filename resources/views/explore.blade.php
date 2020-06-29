<x-app>
    <div>
        @foreach ($users as $user)
        <a class="d-flex align-items-center" href="{{ $user->path() }}">
            <img class="rounded-circle" src="{{ $user->attrs->avatar }}" width="60" height="60"
                alt="{{ $user->name }}'s avatar'">
            <div class="p-4">
                {{ $user->name }}
            </div>
        </a>
        @endforeach
    </div>
</x-app>