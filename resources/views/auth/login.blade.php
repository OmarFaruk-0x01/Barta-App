@section('subtitle')
    Sign in to your account
@endsection

@section('pageTitle')
    Login | Barta
@endsection

<x-guest-layout>
    <!-- Session Status -->
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

    <form
            class="space-y-6"
            action="{{ route('login') }}"
            method="POST">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="text-sm">
                        <a href="{{route('password.request')}}" class="font-semibold text-black hover:text-black">Forgot password?</a>
                    </div>
                </div>
                <div class="mt-2">
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="block mt-1 w-full"
                        :value="old('email')"
                        required
                    />
                </div>
            </div>

            <div>
                <x-primary-button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Sign in
                </x-primary-button>
            </div>
        </form>

    <p class="mt-10 text-center text-sm text-gray-500">
        Don't have an account yet?
        <a href="{{ route('register') }}" class="font-semibold leading-6 text-black hover:text-black">Sign Up</a>
    </p>

</x-guest-layout>
