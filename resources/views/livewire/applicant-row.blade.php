<tr>
    <td class="size-px whitespace-nowrap">
        <div class="py-3 ps-6">
            <label for="hs-at-with-checkboxes-1" class="flex">
                <input type="checkbox" wire:model="$parent.selectedRows" value="{{ $applicant->id }}"
                    class="input-checkbox">
                <span class="sr-only">Checkbox</span>
            </label>
        </div>
    </td>
    <td class="size-px whitespace-nowrap">
        <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
            <div class="flex items-center gap-x-3">
                <img class="inline-block size-[38px] rounded-full"
                    src="https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png"
                    alt="Image Description">
                <div class="grow">
                    <span
                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $applicant->user->name }}</span>
                </div>
            </div>
        </div>
    </td>
    <td class="h-px w-72 whitespace-nowrap">
        <div class="px-6 py-3">
            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $applicant->user->email }}</span>
        </div>
    </td>
    <td class="size-px whitespace-nowrap">
        <div class="px-6 py-3">
            <span class="
                py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full 
                @if($applicant->status == 'Accepted')
                    bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-500
                @elseif($applicant->status == 'Rejected')
                    bg-red-100 text-red-800 dark:bg-red-500/10 dark:text-red-500
                @else
                    bg-blue-100 text-blue-800 dark:bg-blue-500/10 dark:text-blue-500
                @endif
            ">
                @if($applicant->status == 'Accepted')
                    <!-- Icono para 'Accepted' -->
                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                @elseif($applicant->status == 'Rejected')
                    <!-- Icono para 'Rejected' -->
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-full" viewBox="0 0 30 30">
                        <path d="M15,3C8.373,3,3,8.373,3,15c0,6.627,5.373,12,12,12s12-5.373,12-12C27,8.373,21.627,3,15,3z M16.414,15 c0,0,3.139,3.139,3.293,3.293c0.391,0.391,0.391,1.024,0,1.414c-0.391,0.391-1.024,0.391-1.414,0C18.139,19.554,15,16.414,15,16.414 s-3.139,3.139-3.293,3.293c-0.391,0.391-1.024,0.391-1.414,0c-0.391-0.391-0.391-1.024,0-1.414C10.446,18.139,13.586,15,13.586,15 s-3.139-3.139-3.293-3.293c-0.391-0.391-0.391-1.024,0-1.414c0.391-0.391,1.024-0.391,1.414,0C11.861,10.446,15,13.586,15,13.586 s3.139-3.139,3.293-3.293c0.391-0.391,1.024-0.391,1.414,0c0.391,0.391,0.391,1.024,0,1.414C19.554,11.861,16.414,15,16.414,15z"></path>
                    </svg>
                @else
                    <!-- Icono para 'Pending' -->
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 50 50" class="w-full size-2.5">
                        <path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z"></path>
                    </svg>
                @endif
                {{ $applicant->status }}
            </span>
        </div>
    </td>
    <td class="size-px whitespace-nowrap">
        <div class="px-6 py-3">
            <div class="flex items-center gap-x-3">
                <span class="text-xs text-gray-500 dark:text-neutral-500">
                    {{  $applicant->scholarshipCall->name }}
                </span>
            </div>
        </div>
    </td>
    <td class="size-px whitespace-nowrap">
        <div class="px-6 py-3">
            <span class="text-sm text-gray-500 dark:text-neutral-500">
                {{ $applicant->created_at->diffForHumans() }}
            </span>
        </div>
    </td>

    <td class="size-px whitespace-nowrap">
        <div class="px-6 py-1.5">
            <livewire:modals.view-applicant :applicant="$applicant" />
        </div>
    </td>
</tr>
