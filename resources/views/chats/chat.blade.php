<x-app>
    <a href="/profiles/{{ $recipient->username }}">
        <h2 class="font-weight-bold" style="text-decoration: underline">{{ $recipient->name }}</h2>
    </a>
    <div style="height: 90%">
        @include('chats.thread', [
        'messages' => $messages,
        'recipient' => $recipient
        ])
    </div>
    <x-send-message-input :recipient="$recipient" />
</x-app>