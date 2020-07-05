<div class="d-flex align-items-center {{ $message->sender->is(current_user()) ? 'flex-row-reverse' : ''}}">
    <img class="rounded-circle mx-2" src="{{ $message->sender->attrs->avatar }}" alt="avatar" width="25" height="25">
    {{ $message->messageText }}
</div>