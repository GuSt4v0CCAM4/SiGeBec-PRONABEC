<div>
    <x-toast event="scholarship-updated" message="scholarship updated successfully!" />

    <form class="mt-4" wire:submit.prevent="update">
        <div class="flex items-center justify-between gap-3">
            <input placeholder="Static" wire:model="name" class="input-title peer" autocomplete="name"/>
        </div>
        <x-tinymce wire:model="description" autocomplete="description" />
        <button class="mt-4 button-primary" type="submit">Save</button>
    </form>
</div>
