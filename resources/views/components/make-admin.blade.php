@unless (current_user()->is($user))
<form action="/make-admin/{{ $user->username }}" method="POST">
    @csrf
    @method('patch')
    <button class="btn btn-{{ $user->attrs->isAdmin ? 'danger' : 'success' }} rounded-pill shadow" type="submit">
        {{ $user->attrs->isAdmin ? 'Remove Admin' : 'Make Admin' }}
    </button>
</form>
@endunless