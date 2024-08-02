<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" wire:model="$parent.selectedRows" value={{ $lesson->id }}
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $lesson->id }}
    </th>
    <td class="px-6 py-4">
        {{ $lesson->start_date }}
    </td>

    <td class="px-6 py-4">
        {{ $lesson->end_date }}
    </td>
    <td class="px-6 py-4">
        {{-- {{ $lesson->attendance->count() }} / {{ $scholarship->students->count() }} --}}
        777
    </td>
    <td class="px-6 py-4">
        {{-- <livewire:modals.take-attendance :lesson="$lesson" :scholarship="$scholarship" /> --}}
    </td>
</tr>
