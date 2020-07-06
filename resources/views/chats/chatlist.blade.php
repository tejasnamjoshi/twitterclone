<x-app>
    @forelse ($chatlist as $chat)
    <div class="my-4 border-bottom">
        <a href="/chat/{{ $chat['user']->username }}">
            <div class="d-flex">
                <img class="mr-2 rounded-circle" src="{{ $chat['user']->attrs->avatar }}" width="25" height="25" alt="">
                <h2>
                    {{ $chat['user']->name }}
                </h2>
            </div>
        </a>
        <p>{{ $chat['messageText'] }}</p>
    </div>

    @empty
    No chats
    @endforelse
</x-app>