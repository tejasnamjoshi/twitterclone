@unless (current_user()->is($user))
<form action="/profiles/{{ $user->username }}/block" method="get">
    <button class="btn btn-{{ current_user()->isBlocked($user) ? 'success' : 'danger' }} rounded-pill shadow"
        type="submit">
        {{ current_user()->isBlocked($user) ? 'Unblock' : 'Block' }}
    </button>
</form>
@endunless