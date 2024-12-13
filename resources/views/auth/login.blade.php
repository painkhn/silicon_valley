<x-guest-layout>
    <main class="w-full min-h-screen pt-32">
        <div class="px-10 relative">
            <a href="{{ route('index') }}" class="absolute">
                <img src="{{ asset('icons/back-icon.svg') }}" alt="" class="left-0">
            </a>
            <div class="max-w-xl w-full h-auto mx-auto my-0">
                <form class="flex flex-col gap-10" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-center text-5xl">
                        Вход
                    </h1>
                    <input type="email" placeholder="Электронная почта" name="email"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <input type="password" placeholder="Пароль" name="password"
                        class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <button type="submit"
                        class="py-4 !bg-[#C0FF01] text-xl transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                        Войти
                    </button>
                    <a href="{{ route('login.yandex') }}"
                        class="py-4 text-center !bg-[#C0FF01] text-xl transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                        ЯндексID 
                    </a>
                    <a href="{{ route('register') }}" class="text-center text-2xl transition-all hover:text-[#396320]">
                        Регистрация
                    </a>
                </form>
            </div>
        </div>
    </main>
</x-guest-layout>
