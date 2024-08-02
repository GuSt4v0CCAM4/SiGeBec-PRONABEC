<x-layouts.layout>
    @if (session('status'))
        <div class="relative px-4 py-3 mb-5 text-green-700 bg-green-100 border border-green-400 rounded"
            rx-data="{ show: false }" x-init="@this.on('{{ $event }}', () => {
                show = true;
                setTimeout(() => show = false, 3000);
            })" x-show="show"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <h1>Password Reset</h1>
    <p class="my-5">Enter your email, and we'll send you a link to reset your password.</p>

    <form class="max-w-sm mx-auto" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="email" class="label">Your email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="input"
                placeholder="john@doe.com" />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="button-primary">Submit</button>
    </form>
</x-layouts.layout>
