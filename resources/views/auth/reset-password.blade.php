<x-layouts.layout>

    <h1 class="mb-5">Reset your password</h1>

    <form class="max-w-sm mx-auto" action="{{ route('password.update', ['token' => $token]) }}" method="POST">
        @csrf
        <div class="mb-5">
            <label for="email" class="label">Your email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="input"
                placeholder="john@doe.com" />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="label">Your new password</label>
            <input type="password" id="password" name="password" class="input" required />
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="label">Confirm your new password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="input" required />
            @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="button-primary">Submit</button>
    </form>
</x-layouts.layout>
