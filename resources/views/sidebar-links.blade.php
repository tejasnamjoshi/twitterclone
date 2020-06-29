<ul class="p-0">
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="{{ route('home') }}">Home</a>
    </li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="/explore">Explore</a>
    </li>
    {{-- <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="#">Notifications</a>
    </li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="#">Messages</a></li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="#">Bookmarks</a></li>
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block" href="#">Lists</a></li> --}}
    <li class="list-unstyled"><a class="font-weight-bold mb-2 blockquote d-block"
            href="{{ current_user()->path() }}">Profile</a></li>
</ul>