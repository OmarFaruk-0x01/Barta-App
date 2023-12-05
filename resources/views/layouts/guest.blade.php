

<x-common-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" container mx-auto md:px-96 flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="/" class="text-center text-6xl font-bold text-gray-900">
                <h1>Barta</h1>
            </a>

            <h1
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                @yield('subtitle')
            </h1>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            {{ $slot }}
        </div>
    </div>

</x-common-layout>
