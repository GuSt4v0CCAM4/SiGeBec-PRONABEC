<x-layouts.layout>
    <div class="w-screen max-w-screen-xl">
        <h1>Dashboard</h1>
        <div class="p-4 space-y-4 sm:p-6 sm:space-y-6">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 sm:gap-6">
                <x-dashboard.header-card label="Bienvenido" :value="auth()->user()->name" />
                <x-dashboard.header-card label="Total de becas" :value="$scholarshipsCount" />
                <x-dashboard.header-card label="Total de postulantes" :value="$applicantsCount" />
            </div>

            <div class="grid gap-4 lg:grid-cols-2 sm:gap-6">
                <!-- Card -->
                <div
                    class="p-4 md:p-5 min-h-[410px] flex flex-col  gap-3 bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                                Becas en convocatoria
                            </h2>
                        </div>
                        <a class="text-sm font-semibold text-gray-800 dark:text-neutral-200 hover:underline hover:font-bold hover:cursor-pointer">
                            Ver todas las becas
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @if ($applicant > 0 && !auth()->user()->hasRole('admin'))
                            <h4>Usted ya esta aplicando a una beca</h4>
                        @else
                            @foreach ($scholarships as $index => $scholarship)
                                <x-dashboard.scholarship-pill :scholarship="$scholarship" :index="$index" />
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div
                    class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-sm text-gray-500 dark:text-neutral-500">
                                @role('admin')
                                Postulantes
                                @else
                                Futuras Convocatorias
                                @endrole
                            </h2>
                        </div>
                    </div>
                    <!-- End Header -->
                    <div>
                        <ul class="divide-y divide-gray-200 dark:divide-neutral-600">
                            @haspermission('edit scholarship')
                                @forelse ($applicants as $applicant)
                                    <li class="flex justify-between py-3 items center">
                                        <div class="flex gap-3 items center">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
                                                alt="{{ $applicant->name }}" class="w-8 h-8 rounded-full">
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $applicant->name }}
                                                </h3>
                                                <p class="text-xs text-gray-500 dark:text-neutral-500">
                                                    {{ $applicant->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="flex justify-between py-3 items center">
                                        <div class="flex gap-3 items center">
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    No applicants
                                                </h3>
                                            </div>
                                        </div>
                                @endforelse
                            @else
                                @forelse ($scholarshipsFutures as $future)
                                    <li class="flex justify-between py-3 items center">
                                        <div class="flex gap-3 items center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-8 h-8 bi bi-journal-bookmark" viewBox="0 0 16 16">
                                              <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8"/>
                                              <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                              <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                            </svg>
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    {{ $future->name }}
                                                </h3>
                                                <p class="text-xs text-gray-500 dark:text-neutral-500">
                                                    Fecha de inscripción: <b>{{ $future->start_date->format('d M, Y') }}</b>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="flex justify-between py-3 items center">
                                        <div class="flex gap-3 items center">
                                            <div>
                                                <h3 class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                    No hay futuras convocatorias
                                                </h3>
                                            </div>
                                        </div>
                                @endforelse
                            @endhaspermission
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
