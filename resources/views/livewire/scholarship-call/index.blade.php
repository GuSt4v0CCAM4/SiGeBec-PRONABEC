<div class="w-full flex flex-col justify-center items-center">
    <h1 class="text-center">Convocatorias</h1>
    <section class="w-[65%]">
        <div class="flex flex-row justify-between w-full">
            <livewire:modals.create-scholarship-call />
            <x-search :query="$query" placeholder="Buscar Convocatoria..." wire:click='search' class="mx-0 m-0" style="margin:0 0 0 0"/>
        </div>
        <div class="my-4 grid grid-cols-3 gap-4">
            @foreach($calls as $call)
            <div class="max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $call['name'] }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!!$call->description !!}</p>
                <a href='{{route('scholarshipcall.edit', $call->id)}}' class="mt-5 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            @endforeach
        </div>
    </section>
</div>
