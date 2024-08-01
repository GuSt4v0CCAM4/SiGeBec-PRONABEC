<div class="">
    <h1 class="text-6xl font-extrabold dark:text-white">Convocatoria: <small
        class="font-semibold text-gray-500 ms-2 dark:text-gray-400">{{ $scholarshipcall->name }}</small></h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 mt-8">Beca :
        {{ $scholarshipcall->scholarship->name }}</p>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">{{ $scholarshipcall->description }}</p>
    
    <section class="max-w-4xl p-6 mx-auto bg-indigo-600 rounded-md shadow-md dark:bg-gray-800 mt-20">
        <form wire:submit="sendRequest">
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-white dark:text-gray-200" for="emailAddress">Email Address</label>
                    <input wire:model="userEmail" id="username" type="email"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    @error('userEmail')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
    
                <div>
                    <label class="text-white dark:text-gray-200" for="password">Password</label>
                    <input wire:model="userPassword" id="password" type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    @error('userPassword')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
    
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Password Confirmation</label>
                    <input wire:model="userPasswordConfirmation" id="passwordConfirmation" type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    @error('userPasswordConfirmation')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="text-white dark:text-gray-200" for="passwordConfirmation">Text Area</label>
                    <textarea wire:model="userDescription" id="textarea" type="textarea"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    @error('userDescription')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-white">
                        Upload file
                    </label>
                    <input
                        class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </div>
            </div>
    
            <div class="flex justify-between mt-6">
                @error('exist')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
                <button
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-pink-500 rounded-md hover:bg-pink-700 focus:outline-none focus:bg-gray-600">Enviar
                    Solicitud</button>
            </div>
        </form>
    
    </section>
</div>