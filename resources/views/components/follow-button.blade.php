@unless (current_user()->is($user))
<form action="{{ route('follow', $user->username) }}" method="POST">
    @csrf
    <button class="btn btn-primary rounded-pill shadow">
        {{ current_user()->following($user) ? 'Unfollow me' : 'Follow me' }}
    </button>
</form>
@endunless