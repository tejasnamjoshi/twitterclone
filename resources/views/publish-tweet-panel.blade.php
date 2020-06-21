<div class="border rounded-lg border-primary p-3 mb-3">
    <form action="/tweets" method="POST">
        @csrf
        <textarea class="form-control w-100" name="body" placeholder="What's happening?" required></textarea>
        <hr>
        <footer class="d-flex justify-content-between">
            <img class="rounded-circle mr-4" width="50" height="50" src="{{ current_user()->avatar }}" alt="ALT">

            <button class="btn btn-primary rounded-pill px-5" style="border: 1px transparent" type="submit">
                Publish
            </button>
        </footer>
    </form>

    @error('body')
    <p class="text-danger mt-3">{{ $message }}</p>
    @enderror
</div>