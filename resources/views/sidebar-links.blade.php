<ul class="p-0">
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="{{ route('home') }}">Home</a>
    </li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="/explore">Explore</a>
    </li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="/chatlist">Chats</a>
    </li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block"
            href="{{ current_user()->path() }}">Profile</a></li>
</ul>