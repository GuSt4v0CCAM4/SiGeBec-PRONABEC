<div x-data="tinymceEditor(@entangle($attributes->wire('model')))" wire:ignore>
    <textarea :id="$id('tinymce')" x-ref="tinymce" placeholder="Write something..."></textarea>
</div>
