<div>
    <x-toast event="applicant-deleted" message="Student deleted successfully!" />
    <x-toast event="applicant-added" message="Student added successfully!" />
    <x-toast event="applicant-updated" message="Student updated successfully!" />

    <div class="flex flex-col mb-7">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div
                        class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Applicants
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-neutral-400">
                                Add applicants, edit and more.
                            </p>
                        </div>

                        <x-search :query="$query" placeholder="Buscar Postulante..." wire:click='search' />

                        <div>
                            <div class="inline-flex gap-x-2">
                                <button wire:click="deleteMarked" class="button-danger">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Delete selected
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-neutral-700">
        <thead class="bg-gray-50 dark:bg-neutral-800">
            <tr>
                <th scope="col" class="py-3 ps-6 text-start">
                </th>

                <th scope="col" class="w-32 py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Name
                        </span>
                    </div>
                </th>

                <th scope="col" class="w-32 px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Email
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2 justify-center" >
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Status
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2 justify-center">
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Convocatoria
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2 justify-center">
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Fecha de envio
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2 justify-center">
                        <span class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-neutral-200">
                            Ver 
                        </span>
                    </div>
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700" wire:loading.class="animate-pulse">
            @forelse ($applicants as $applicant)
                <livewire:applicant-row :applicant="$applicant" wire:key="applicant-{{ $applicant->id }}" />
            @empty
                <tr>
                    <td class="px-6 py-4" colspan="7">
                        <div class="flex justify-center items -center">
                            <span class="text-sm font-medium text-gray-500 dark:text-neutral-500">
                                No applicants found
                            </span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $applicants->links() }}
</div>
