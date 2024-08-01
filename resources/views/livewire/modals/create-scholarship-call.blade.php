<div x-data="{ modalOpen: $wire.entangle('modalOpen') }">
    <button @click="modalOpen =!modalOpen" class="flex items-center button-secondary gap-x-2">
        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M5 12h14" />
            <path d="M12 5v14" />
        </svg>
        Crear Convocatoria
    </button>

    <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modalOpen = false" x-show="modalOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

            <div x-cloak x-show="modalOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                <div class="flex items-center justify-between space-x-4">
                    <h1 class="text-xl font-medium text-gray-800">Crear convocatoria de una beca</h1>

                    <button @click="modalOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 space-y-4 md:p-5">
                    <h1 class="text-gray-500">
                        @php
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $beca = App\Models\Scholarship::find((int)$scholarship_id);
                            $month = date('m', strtotime($start_date));
                            $becaName = $beca?->name." - ".$meses[$month-1];
                        @endphp
                        {{ $scholarship_id!=""?$becaName:"Nombre de la Convocatoria" }}
                    </h1>
                    <form wire:submit.prevent="createScholarshipCall">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="label">Inicio de convocatoria</label>
                                <input type="date" id="date" wire:model.live="start_date"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="price" class="label">Fin de convocatoria</label>
                                <input type="date" id="date" wire:model="end_date"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>
                            <div class="col-span-2">
                                    <label for="scholarship" class="label">Scholarship</label>
                                    <select id="scholarship" wire:model.live="scholarship_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Choose a scholarship</option>
                                        @foreach ($scholarships as $scholarship)
                                            <option value="{{ $scholarship->id }}">{{ $scholarship->name }}</option>
                                        @endforeach
                                    </select>
                                @error('scholarship_id')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="button-primary col-span-2" type="submit">Añadir convocatoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
