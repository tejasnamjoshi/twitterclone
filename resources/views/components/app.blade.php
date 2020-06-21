<x-master>
    <section class="px-4">
        <main class="container-fluid mx-auto">
            <div class="d-flex justify-content-between">
                @auth
                <div class="d-flex justify-content-center mx-5 flex-shrink-0">
                    @include('sidebar-links')
                </div>
                @endauth


                <div class="flex-grow-1 mx-3" style="max-width: 700px">
                    {{ $slot }}
                </div>

                @auth
                <div class="w-25 flex-shrink-0 pl-5">
                    @include('friends-list')
                </div>
                @endauth

            </div>
        </main>
    </section>
</x-master>