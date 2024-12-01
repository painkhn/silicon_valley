<x-app-layout>
    <main class="py-20">
        <div class="px-10">
            <div class="max-w-6xl w-full h-auto mx-auto my-0 flex justify-between">
                <div class="w-1/3">
                    <form class="mb-10" method="POST" action="{{ route('product.upload') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <h2 class="text-3xl mb-10">
                            Продукт
                        </h2>
                        <div class="flex flex-col gap-5 mb-10">
                            <!-- Название товара -->
                            <input type="text" name="name" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>

                            <!-- Описание товара -->
                            <textarea name="description" placeholder="Описание"
                                class="w-full h-32 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]" required></textarea>

                            <!-- Выбор категории -->
                            <input name="price" placeholder="Цена" type='number'
                                class="w-full !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required></input>

                            <!-- Выбор категории -->
                            <div>
                                <label for="category">Категория товара</label>
                                <select name="category_id" id="category"
                                    class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                    required>
                                    <option value="">Выберите категорию</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Фото товара -->
                            <div>
                                <label>Фото товара</label>
                                <input type="file" name="image"
                                    class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            </div>
                        </div>

                        <h2 class="text-3xl mb-10">
                            Комплектация
                        </h2>

                        <!-- Видеокарта -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Видеокарта</h3>
                            <input type="text" name="components[0][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[0][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[0][type]" value="video_card">
                        </div>

                        <!-- Процессор -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Процессор</h3>
                            <input type="text" name="components[1][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[1][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[1][type]" value="processor">
                        </div>

                        <!-- Материнская плата -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Материнская плата</h3>
                            <input type="text" name="components[2][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[2][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[2][type]" value="motherboard">
                        </div>

                        <!-- Оперативная память -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Оперативная память</h3>
                            <input type="text" name="components[3][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[3][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[3][type]" value="ram">
                        </div>

                        <!-- SSD накопитель -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">SSD накопитель</h3>
                            <input type="text" name="components[4][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[4][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[4][type]" value="ssd">
                        </div>

                        <!-- Охлаждение -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Охлаждение</h3>
                            <input type="text" name="components[5][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[5][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[5][type]" value="cooling">
                        </div>

                        <!-- Блок питания -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Блок питания</h3>
                            <input type="text" name="components[6][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[6][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[6][type]" value="power_supply">
                        </div>

                        <!-- Корпус -->
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">Корпус</h3>
                            <input type="text" name="components[7][name]" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"
                                required>
                            <input type="file" name="components[7][image]"
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            <input type="hidden" name="components[7][type]" value="case">
                        </div>

                        <button type="submit"
                            class="w-full py-2 !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                            Добавить
                        </button>
                    </form>
                </div>
                <div class="w-1/3">
                    <form class="mb-10" action="{{ route('category.upload') }}" method="POST">
                        @csrf
                        <h2 class="text-3xl mb-10">
                            Новая категория
                        </h2>
                        <div class="flex flex-col gap-5 mb-10">
                            <input type="text" placeholder="Название" name="name"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <textarea name="description" id="description" placeholder="Описание"
                                class="w-full h-32 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"></textarea>
                            <button type="submit"
                                class="w-full py-2 !bg-[#C0FF01] transition-all hover:!bg-[#396320] hover:text-white rounded-xl">
                                Добавить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>