<form action="/chat/{{ $recipient->username }}" method="POST">
    @csrf
    <div class="d-flex">
        <div class="form-group flex-grow-1 m-0 mr-2">
            <input type="text" class="form-control" name="messageText" placeholder="Add Message" required>
            @error('messageText')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button class="btn btn-primary">
            Send
        </button>
    </div>
</form>