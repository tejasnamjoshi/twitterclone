@forelse ($messages as $message)
<div class="my-4">
    <x-message :message="$message" />
</div>
@empty
No messages yet!
@endforelse