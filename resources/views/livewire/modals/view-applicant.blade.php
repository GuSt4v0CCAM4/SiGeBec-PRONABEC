<div x-data="{ modelOpen: false }">
    @if ($applicant->status != 'Pending')
        <button class="button-disabled" type="button" disabled>
            Ver detalles
        </button>
    @else
        <button @click="modelOpen = !modelOpen" class="button-primary" type="button">
            Ver detalles
        </button>
    @endif
    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        {{ $applicant->user->name }}
                    </h3>
                    <button type="button" class="button-close" @click="modelOpen = false">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 flex justify-between flex-row">
                    <div class="flex flex-col">
                        <div class="font-semibold">
                            Convocatoria
                        </div>
                        <div class="">
                            {!! $applicant->scholarshipCall->name !!}
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="font-semibold">
                            Beca
                        </div>
                        {!! $applicant->scholarshipCall->scholarship->name !!}
                    </div>
                </div>

                <div class="w-full p-4">
                    <h3 class="font-semibold mb-2">Adjuntar explicaciones (opcional)</h3>
                    <textarea class="w-full" name="" id="" cols="30" rows="10"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    @can('edit scholarship')
                        <button data-modal-hide="modal-{{ $applicant->id }}" type="button"
                            wire:click="aceptapplicant"
                            class="ml-2 button-primary">Aprobar</button>
                        <button data-modal-hide="modal-{{ $applicant->id }}" type="button"
                            wire:click="rejectapplicant"
                            class="ml-2 button-danger">Denegar</button>
                    @endcan
                    @can('take attendance')
                        <a data-modal-hide="modal-{{ $scholarship->id }}"
                            href="{{ route('scholarship.show', $scholarship) }}" class="button-primary">View scholarship</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
