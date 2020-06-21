<div class="border border-dark rounded">
    @forelse ($tweets as $tweet)
    @include('tweet')
    @empty
    <p class="font-weight-bold text-center">No content available</p>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $tweets->links() }}
</div>