<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="button-primary" type="button">
        Vizualizar información
    </button>
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
                        {{ $scholarship->name }}
                    </h3>
                    <button type="button" class="button-close" @click="modelOpen = false">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                    <div>
                        {!! $scholarship->description !!}
                    </div>
                    <div>
                        <h3 class="mb-2 text-lg font-semibold">Convocatorias</h3>
                        <ul class="pl-5 list-disc">
                            @forelse ($scholarship->calls as $call)
                                <li class="text-sm text-gray-700 grid grid-cols-2">
                                    <p>{{ $call->name }}</p>
                                    <p class="text-gray-600">{{ $call->start_date->format('d/m/Y') }} - {{ $call->end_date->format('d/m/Y') }}</p>
                                </li>
                            @empty
                                <li class="text-sm text-gray-700">No requirements</li>
                            @endforelse
                        </ul>
                    </div>
                    {{-- applicant --}}
                    {{-- <h3 class="mb-2 text-lg font-semibold">applicants</h3> --}}
                    {{-- <ul class="pl-5 list-disc">
                        @forelse ($scholarship->applicants as $applicant)
                            <li class="text-sm text-gray-700">{{ $applicant->name }}</li>
                        @empty
                            <li class="text-sm text-gray-700">No applicants</li>
                        @endforelse
                    </ul> --}}

                    {{-- STUDENTS --}}
                    {{-- <h3 class="mb-2 text-lg font-semibold">Students</h3>
                    <ul class="pl-5 list-disc">
                        @forelse ($scholarship->students->take(10) as $index => $student)
                            <li class="text-sm text-gray-700">{{ $student->name }}, {{ $student->lastname }}</li>
                            @if ($index === 9 && $scholarship->students->count() > 10)
                                <li class="text-sm text-gray-700">...</li>
                            @endif
                        @empty
                            <li class="text-sm text-gray-700">No students</li>
                        @endforelse
                    </ul> --}}
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    @can('edit scholarship')
                        <a data-modal-hide="modal-{{ $scholarship->id }}"
                            href="{{ route('scholarship.show', $scholarship) }}" class="button-primary">Editar</a>
                        <button data-modal-hide="modal-{{ $scholarship->id }}" type="button"
                            wire:click="$parent.$parent.deleteScholarship({{ $scholarship->id }})"
                            wire:confirm="Are you sure you want to delete this scholarship?"
                            class="ml-2 button-danger">Eliminar</button>
                    @endcan
                    @can('take attendance')
                        <a data-modal-hide="modal-{{ $scholarship->id }}"
                            href="{{ route('scholarship.show', $scholarship) }}" class="button-primary">Ver información</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
