<div>
    @cannot('edit scholarship')
        <h1 class="text-6xl font-extrabold dark:text-white">Beca: <small
                class="font-semibold text-gray-500 ms-2 dark:text-gray-400">{{ $scholarship->name }}</small></h1>
        
    @endcannot

    @can('edit scholarship')
        <x-toast event="scholarship-updated" message="scholarship updated successfully!" />
        <div class="absolute flex items-center justify-center p-0">
            <p class="text-yellow-500" wire:dirty>You have unsaved changes!</p>
        </div>

        <form class="mt-4" wire:submit.prevent="update">
            <div class="flex items-center justify-between gap-3">
                <input placeholder="Static" wire:model="name" class="input-title peer" />
                <button class="mt-4 button-primary" type="submit">Save</button>
            </div>
            <x-tinymce wire:model="description" />

            {{-- <h2 class="mt-4 text-xl font-bold">applicant</h2>

            <label for="applicant" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Assign a applicant
            </label>
            <select id="applicant" name="countries" wire:model="selectedapplicant"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="{{ $scholarship->applicants->first()->id ?? '' }}">
                    {{ $scholarship->applicants->first()->name ?? 'Select a applicant' }}
                </option>
                @foreach ($applicants as $applicant)
                    <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                @endforeach
            </select> --}}
        </form>
    @endcan

    @can('edit scholarship')
        <livewire:attendance :lessons="$scholarship->lessons" :scholarship="$scholarship" />

        {{-- <h2 class="mt-4 text-xl font-bold">Students</h2>

        <label for="newStudent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Add a Student
        </label>
        <div class="flex items-center justify-between gap-3">
            <select id="newStudent" name="newStudent" wire:model="selectedNewStudent"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Select a student to add</option>
                @foreach ($students as $student)
                    @if (!$scholarship->students->contains($student))
                        <option value="{{ $student->id }}">{{ $student->name }}, {{ $student->lastname }}</option>
                    @endif
                @endforeach
            </select>
            <button class="button-primary" wire:click="addStudent"> <svg class="flex-shrink-0 size-4"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg></button>
        </div> --}}
        {{-- <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            @foreach ($scholarship->students as $student)
                <li>
                    {{ $student->name }}, {{ $student->lastname }}
                    <button class="button-close" wire:click="removeStudent({{ $student->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul> --}}
    @endcan
</div>
