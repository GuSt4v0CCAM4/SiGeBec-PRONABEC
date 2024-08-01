<x-layouts.layout>
    <!-- Hero -->
    <div class="relative">
        <!-- Gradients -->
        <div aria-hidden="true" class="absolute flex transform -translate-x-1/2 -top-96 start-1/2">
            <div
                class="bg-gradient-to-r from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900">
            </div>
            <div
                class="bg-gradient-to-tl from-blue-50 via-blue-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem] dark:from-indigo-900/70 dark:via-indigo-900/70 dark:to-blue-900/70">
            </div>
        </div>
        <!-- End Gradients -->

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
                <div class="max-w-2xl mx-auto text-center">
                    <!-- Title -->
                    <div class="max-w-2xl mt-5">
                        <h1
                            class="block text-4xl font-semibold text-gray-800 md:text-5xl lg:text-6xl dark:text-neutral-200">
                            Scholarships
                        </h1>
                    </div>
                    <!-- End Title -->
                    <div class="max-w-3xl mt-5">
                        <p class="text-lg text-gray-600 dark:text-neutral-400"> Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad.

                        </p>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-center gap-3 mt-8">
                        <a class="inline-flex items-center px-4 py-3 text-sm font-semibold text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                            href={{ route('login') }}>
                            Get Started
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                    </div>
                    <!-- End Buttons -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->
</x-layouts.layout>
