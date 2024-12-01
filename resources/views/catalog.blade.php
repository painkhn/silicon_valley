<x-app-layout>
    <main class="py-20">
        <div class="px-10">
            @foreach ($categories as $category)
                <h2 class="max-w-3xl mx-auto my-0 text-5xl text-center mb-20">
                    {{ $category->name }}. {{ $category->description }}.
                </h2>
                <ul class="flex flex-wrap justify-center gap-10">
                    @foreach ($category->products as $product)
                        <li>
                            <a href="{{ route('product.show', [$product->id]) }}">
                                <div class="w-[400px]">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image"
                                        class="w-full h-[400px]">
                                    <h3 class="text-3xl">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-xl mb-5">
                                        Цена {{ $product->price }} ₽
                                    </p>
                                    <p class="pb-10 mb-10 border-b-2 border-black/40">
                                        {{ $product->description }}
                                    </p>
                                    <!-- Вывод комплектующих -->
                                    <ul class="flex flex-col gap-3">
                                        @foreach ($product->components as $component)
                                            @if (!in_array($component->type, ['cooling', 'power_supply', 'case']))
                                                <li class="flex gap-2 text-xs">
                                                    <img src="{{ asset('/icons/' . $component->type . '-icon.svg') }}"
                                                        alt="">
                                                    <div>
                                                        <h4>
                                                            @switch($component->type)
                                                                @case('video_card')
                                                                    Видеокарта:
                                                                @break

                                                                @case('processor')
                                                                    Процессор:
                                                                @break

                                                                @case('motherboard')
                                                                    Материнская плата:
                                                                @break

                                                                @case('ram')
                                                                    Оперативная память:
                                                                @break

                                                                @case('ssd')
                                                                    SSD накопитель:
                                                                @break

                                                                @default
                                                                    {{ ucfirst($component->type) }}:
                                                            @endswitch
                                                        </h4>
                                                        <p>
                                                            {{ $component->name }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </main>
</x-app-layout>
