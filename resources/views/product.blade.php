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
                        <div class="grid gap-5 w-full">
                            <div class="flex flex-col gap-5">
                                <p class="text-3xl">
                                    Цена {{ $product->price }} ₽
                                </p>
                                @if (Auth::user() && Auth::user()->is_admin == 1)
                                    <form action="{{ route('product.delete', [$product->id]) }}" method="POST"
                                        class="w-min h-min p-0 m-0 border-0" id="deleteForm">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-14 py-4 text-xl !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl"
                                            type="submit">Удалить</button>
                                    </form>
                                    <button data-modal-target="authentication-modal"
                                        data-modal-toggle="authentication-modal"
                                        class="px-14 py-4 text-xl !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl"
                                        type="button">
                                        Редактировать
                                    </button>
                                @endif
                            </div>
                            <form action="{{ route('basket.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <button type="submit"
                                    class="px-14 py-4 text-xl !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                                    В корзину
                                </button>
                            </form>
                        </div>

                        <!-- Main modal -->
                        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Редактирование {{ $product->name }}
                                        </h3>
                                        <button type="button"
                                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>

                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="flex flex-col gap-5 mb-10"
                                            action="{{ route('product.update', [$product->id]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <input type="text" name="name" placeholder="Название"
                                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                                value="{{ $product->name }}" required>

                                            <textarea name="description" placeholder="Описание"
                                                class="w-full h-32 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]" required>{{ $product->description }}</textarea>

                                            <input name="price" placeholder="Цена" type='number'
                                                class="w-full !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                                value="{{ $product->price }}" required></input>

                                            <label for="category">Категория товара</label>
                                            <select name="category_id" id="category"
                                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                                required>
                                                <option value="">Выберите категорию</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <button type="submit">Сохранить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div>
                                        <img src="{{ asset('storage/' . $component->image_path) }}"
                                            alt="{{ $component->name }}">
                                    </div>
                                    <div class="w-1/2 flex flex-col gap-5">
                                        <h2 class="text-5xl font-medium">
                                            @switch($component->type)
                                                @case('video_card')
                                                    Видеокарта
                                                @break

                                                @case('processor')
                                                    Процессор
                                                @break

                                                @case('motherboard')
                                                    Материнская плата
                                                @break

                                                @case('ram')
                                                    Оперативная память
                                                @break

                                                @case('ssd')
                                                    SSD накопитель
                                                @break

                                                @case('cooling')
                                                    Охлаждение
                                                @break

                                                @case('power_supply')
                                                    Блок питания
                                                @break

                                                @case('case')
                                                    Корпус
                                                @break

                                                @default
                                                    {{ ucfirst($component->type) }}
                                            @endswitch
                                        </h2>
                                        <p class="text-3xl">
                                            {{ $component->name }}
                                        </p>
                                    </div>
                                @else
                                    <div class="w-1/2 flex flex-col gap-5 text-right">
                                        <h2 class="text-5xl font-medium">
                                            @switch($component->type)
                                                @case('video_card')
                                                    Видеокарта
                                                @break

                                                @case('processor')
                                                    Процессор
                                                @break

                                                @case('motherboard')
                                                    Материнская плата
                                                @break

                                                @case('ram')
                                                    Оперативная память
                                                @break

                                                @case('ssd')
                                                    SSD накопитель
                                                @break

                                                @case('cooling')
                                                    Охлаждение
                                                @break

                                                @case('power_supply')
                                                    Блок питания
                                                @break

                                                @case('case')
                                                    Корпус
                                                @break

                                                @default
                                                    {{ ucfirst($component->type) }}
                                            @endswitch
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</x-app-layout>
