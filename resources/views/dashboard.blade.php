<x-app-layout>
    <main class="pt-20">
        <div class="px-10 flex justify-between">
            <div class="w-1/3">
                <div class="flex gap-10 mb-10">
                    <div class="w-[200px] h-[200px] overflow-hidden">
                        <img src="{{ asset('img/default_product.png') }}" alt="" class="w-full h-[200px]">
                    </div>
                    <div class="text-xl flex flex-col gap-5">
                        <p>
                            {{ Auth::user()->name }} {{ Auth::user()->surname }}
                        </p>
                        <p>
                            {{ Auth::user()->email }}
                        </p>
                        <p>
                            {{ Auth::user()->phone }}
                        </p>
                        <p>
                            Заказов: {{ $orders->count() }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col gap-5">
                    <a href="{{ route('profile.edit') }}">
                        <button
                            class="px-20 py-4 !bg-[#C0FF01] text-xl transition-all rounded-xl hover:!bg-[#396320] hover:text-white">
                            Редактировать
                        </button>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-20 py-4 !bg-[#C0FF01] text-xl transition-all rounded-xl hover:!bg-[#396320] hover:text-white">
                            Выйти
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-1/3">
                <h3 class="mb-5 text-xl font-medium">
                    Заказы:
                </h3>
                <ul class="flex flex-col gap-5">
                    @foreach ($orders as $item)
                        <li>
                            <div class="flex gap-5">
                                <img src="{{ asset('storage/' . $item->product->image_path) }}" alt=""
                                    class="h-[150px]">
                                <div>
                                    <h3 class="text-3xl">
                                        {{ $item->product->name }}
                                    </h3>
                                    <button class="text-xl text-[#396320]">
                                        {{ $item->product->category->name }}
                                    </button>
                                    <p>Кол-во: {{ $item->count }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
</x-app-layout>
