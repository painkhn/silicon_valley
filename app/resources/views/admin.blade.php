<x-app-layout>
    <main class="py-20">
        <div class="px-10">
            <div class="max-w-6xl w-full h-auto mx-auto my-0 flex justify-between">
                <div class="w-1/3">
                    <form class="mb-10">
                        <h2 class="text-3xl mb-10">
                            Продукт
                        </h2>
                        <div class="flex flex-col gap-5 mb-10">
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <textarea name="" id="" placeholder="Описание"
                                class="w-full h-32 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]"></textarea>
                            <div>
                                <label>Фото товара</label>
                                <input
                                    class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    id="small_size" type="file">
                            </div>
                        </div>
                        <h2 class="text-3xl mb-10">
                            Комплектация
                        </h2>
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">
                                Видеокарта
                            </h3>
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="small_size" type="file">
                        </div>
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">
                                Процессор
                            </h3>
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="small_size" type="file">
                        </div>
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">
                                Материнская плата
                            </h3>
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="small_size" type="file">
                        </div>
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">
                                Оперативная память
                            </h3>
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="small_size" type="file">
                        </div>
                        <div class="flex flex-col gap-5">
                            <h3 class="text-center">
                                SSD накопитель
                            </h3>
                            <input type="text" placeholder="Название"
                                class="w-full h-14 !rounded-xl !px-10 focus:!ring-[#396320] focus:!border-[#396320]">
                            <input
                                class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="small_size" type="file">
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
