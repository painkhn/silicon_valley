<x-app-layout>
    <main class="my-12">
        <div class="max-w-[1500px] w-full h-auto mx-auto my-0">
            <div class="w-full h-[874px] mb-24">
                <img src="{{ asset('img/pc-image.png') }}" alt="">
            </div>
            <div class="w-full h-[874px] flex relative justify-center mb-24">
                <img src="{{ asset('img/pc-image-2.jpg') }}" alt=""
                    class="w-full absolute -z-10 pointer-events-none top-1/2 -translate-y-1/2">
                <div class="text-white text-center pt-[180px]">
                    <h1 class="text-5xl">
                        Игровые компьтеры
                    </h1>
                    <p class="text-3xl">
                        Компьютеры для геймеров
                    </p>
                    <button
                        class="w-64 h-16 text-[#254115] bg-[#C0FF01] text-3xl mt-5 rounded-2xl transition-all hover:bg-green-400">
                        Подробнее
                    </button>
                </div>
            </div>
            <div class="w-full h-[874px] flex relative justify-center mb-24">
                <img src="{{ asset('img/pc-image-3.png') }}" alt=""
                    class="w-full absolute -z-10 pointer-events-none top-1/2 -translate-y-1/2">
                <div class="text-white text-center pt-14">
                    <h1 class="text-5xl">
                        Бюджетные компьтеры
                    </h1>
                    <p class="text-3xl">
                        Компьютеры для геймеров
                    </p>
                    <button
                        class="w-64 h-16 text-[#254115] bg-[#C0FF01] text-3xl mt-5 rounded-2xl transition-all hover:bg-green-400">
                        Подробнее
                    </button>
                </div>
            </div>
            <div class="w-full h-[874px] flex relative justify-center">
                <img src="{{ asset('img/why-image.png') }}" alt=""
                    class="w-full absolute -z-10 pointer-events-none top-1/2 -translate-y-1/2">
            </div>
        </div>
    </main>
</x-app-layout>
