<x-layouts.layout>

    <section>
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div>
                <div>
                    <span class="text-sm font-semibold text-gray-500 uppercase">403</span>
                    <p class="mt-8 text-4xl font-semibold tracking-tighter text-black text-balance lg:text-6xl">
                        Page not authorized
                    </p>
                    <p class="mx-auto mt-4 text-sm font-medium text-gray-500 text-balance">
                        Sorry, you are not authorized to access this page.
                    </p>
                </div>
                <div class="flex flex-col items-center gap-2 mx-auto mt-8 md:flex-row">
                    <a href="{{ route('home') }}" class="button-primary">
                        Go back home
                    </a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.layout>
