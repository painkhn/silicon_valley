<x-guest-layout>
    <main class="w-full min-h-screen pt-32">
        <div class="px-10 relative">
            <a href="{{ route('index') }}" class="absolute">
                <img src="{{ asset('icons/back-icon.svg') }}" alt="" class="left-0">
            </a>
            <div class="max-w-xl w-full h-auto mx-auto my-0">
                <form class="flex flex-col gap-10" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="text-center text-5xl">
                        Регистрация
                    </h1>
                    <input type="text" placeholder="Имя" name="name"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <input type="text" placeholder="Фамилия" name="surname"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                    <input type="email" placeholder="Электронная почта" name="email"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <input type="tel" placeholder="Номер телефона" name="phone"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    <input type="password" placeholder="Пароль" name="password"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <input type="password" placeholder="Повторить пароль" name="password_confirmation"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <button type="submit"
                        class="py-4 !bg-[#C0FF01] text-xl transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                        Регистрация
                    </button>
                    <a href="{{ route('login') }}" class="text-center text-2xl transition-all hover:text-[#396320]">
                        Вход
                    </a>
                </form>
            </div>
        </div>
    </main>
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-guest-layout>
