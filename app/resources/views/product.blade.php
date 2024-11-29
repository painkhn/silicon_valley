<x-app-layout>
    <main class="py-20">
        <div class="px-10">
            <div class="flex gap-10 px-40 mb-20">
                <img src="{{ asset('storage/' . $product->image_path) }}" alt=""
                    class="w-[500px] h-[500px] rounded-xl">
                <div class="flex flex-col justify-between py-20">
                    <h2 class="text-5xl font-medium">{{ $product->name }}</h2>
                    <p class="text-3xl">
                        {{ $product->description }}
                    </p>
                    <div class="flex gap-10 items-center">
                        <p class="text-3xl">
                            Цена {{ $product->price }} ₽
                        </p>
                        <form action="{{ route('basket.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button type="submit"
                                class="px-14 py-4 text-xl !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-5xl font-medium text-center mb-20">
                    Комплектация {{ $product->name }}
                </h1>
                <ul class="flex flex-col gap-20">
                    @foreach ($product->components as $component)
                        <li>
                            <div class="flex items-center gap-20">
                                @if ($loop->odd)
                                    <!-- Для четных и нечетных позиций меняем местами картинку и описание -->
                                    <div>
                                        <img src="{{ asset('storage/' . $component->image_path) }}"
                                            alt="{{ $component->name }}">
                                    </div>
                                    <div class="w-1/2 flex flex-col gap-5">
                                        <h2 class="text-5xl font-medium">
                                            {{ ucfirst($component->type) }}
                                        </h2>
                                        <p class="text-3xl">
                                            {{ $component->name }}
                                        </p>
                                    </div>
                                @else
                                    <div class="w-1/2 flex flex-col gap-5 text-right">
                                        <h2 class="text-5xl font-medium">
                                            {{ ucfirst($component->type) }}
                                        </h2>
                                        <p class="text-3xl">
                                            {{ $component->name }}
                                        </p>
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/' . $component->image_path) }}"
                                            alt="{{ $component->name }}">
                                    </div>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </main>
</x-app-layout>
