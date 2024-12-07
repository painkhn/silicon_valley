<header class="w-full min-h-24 flex items-center justify-between px-20">
    <div class="flex items-center">
        <a href="{{ route('index') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="" class="transition-all hover:opacity-80">
        </a>
        <nav>
            <ul class="flex items-center ml-20 gap-10 text-2xl opacity-80 transition-all hover:opacity-100">
                <li><a href="{{ route('product.index') }}" class="transition-all hover:text-[#396320]">Игровые ПК</a></li>
                <li><a href="{{ asset('dashboard') }}" class="transition-all hover:text-[#396320]">Личный кабинет</a>
                </li>
                <li><a href="{{ route('about') }}" class="transition-all hover:text-[#396320]">О нас</a></li>
                @if (Auth::user() && Auth::user()->is_admin == 1)
                    <li>
                        <a href="{{ route('admin.index') }}" class="transition-all hover:text-[#396320]">Админка</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="flex items-center">
        <form action="{{ route('product.search') }}" method="POST">
            @csrf
            <input type="search" name="word" id="word"
                class="searchInput hidden border border-[#396320] w-96 w rounded-md mr-2 h-11 transition-all outline-none px-4 focus:ring-2 focus:ring-[#396320]">
            <button onclick="searchToggle()" type="button" class="searchToggleButton outline-none">
                <svg class="w-6 h-6 text-[#396320]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </form>
        <a href="{{ route('basket.index') }}" class="ml-10">
            <svg class="w-6 h-6 text-[#396320]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
            </svg>

        </a>
    </div>
</header>

<script>
    const searchToggle = () => {
        const searchToggleButton = document.querySelector(".searchToggleButton");
        const searchInput = document.querySelector(".searchInput");

        searchInput.classList.toggle("hidden");
    };
</script>
