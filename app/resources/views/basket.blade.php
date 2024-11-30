<x-app-layout>
    <main class="pt-20">
        @if ($baskets->count())
            <form class="max-w-7xl w-full h-auto mx-auto my-0">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-[#282828]">
                            <tr class="text-white">
                                <th scope="col" class="px-6 py-3">
                                    Товар
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Количество
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Стоимость
                                </th>
                                <th scope="col" class="px-6 py-3">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($baskets as $basket)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        <div class="flex gap-8">
                                            <div class="w-[150px] h-[150px] !overflow-hidden">
                                                <img src="{{ asset('storage/' . $basket->product->image_path) }}"
                                                    alt="" class="h-[150px]">
                                            </div>
                                            <div>
                                                <h3 class="text-3xl">
                                                    {{ $basket->product->name }}
                                                </h3>
                                                <p class="text-xl text-[#396320]">
                                                    {{ $basket->product->category->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        <form class="mx-auto" id="quantity-form">
                                            <div class="relative flex items-center max-w-[8rem]">
                                                <button type="button" id="decrement-button"
                                                    data-product-id="{{ $basket->product_id }}"
                                                    data-count="{{ $basket->count }}"
                                                    class="!bg-[#423F3F] border !border-[#423F3F] rounded-s-lg p-3 h-11">
                                                    <svg class="w-3 h-3 text-[#C0FF01]" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                    </svg>
                                                </button>
                                                <input type="text" id="quantity-input" data-input-counter
                                                    aria-describedby="helper-text-explanation"
                                                    value="{{ $basket->count }}"
                                                    class="!bg-[#2E2E2E] border-x-0 border-[#2E2E2E] h-11 text-center text-white text-sm focus:!ring-[#C0FF01] focus:!border-[#C0FF01] block w-full py-2.5"
                                                    min="0" required readonly />
                                                <button type="button" id="increment-button"
                                                    data-product-id="{{ $basket->product_id }}"
                                                    data-count="{{ $basket->count }}"
                                                    class="!bg-[#423F3F] border !border-[#423F3F] rounded-r-lg p-3 h-11">
                                                    <svg class="w-3 h-3 text-[#C0FF01]" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M9 1v16M1 9h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $basket->product->price }} р
                                    </td>
                                    <td class="px-6 py-4">
                                        <button id="delete-button" data-product-id="{{ $basket->product_id }}">
                                            <svg class="w-6 h-6 text-red-400 transition-all hover:text-red-300"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="text-right mt-5 mb-10">
                    ИТОГО: {{ $totalAmount }} р
                </p>
                <div class="text-center">
                    <a type="button" href="{{ route('order.create') }}" id="create-order-btn"
                        class="px-20 py-8 !bg-[#C0FF01] text-xl transition-all hover:!bg-[#396320] hover:text-white">
                        Перейти к оформлению
                    </a>
                </div>
            </form>
        @else
            <p class="text-center">Товаров в корзине не найдено</p>
        @endif
    </main>
</x-app-layout>
<script>
    document.getElementById('decrement-button').addEventListener('click', function() {
        let productId = this.getAttribute('data-product-id');
        let currentQuantity = parseInt(this.getAttribute('data-count'));

        updateQuantity('decrement', productId, currentQuantity);
    });

    document.getElementById('increment-button').addEventListener('click', function() {
        let productId = this.getAttribute('data-product-id');
        let currentQuantity = parseInt(this.getAttribute('data-count'));

        updateQuantity('increment', productId, currentQuantity);
    });

    function updateQuantity(action, productId, currentQuantity) {
        if (action === 'decrement' && currentQuantity > 1) {
            currentQuantity--;
        } else if (action === 'increment') {
            currentQuantity++;
        }

        let formData = new FormData();
        formData.append('product_id', productId);
        formData.append('quantity', currentQuantity);

        fetch('/basket/update', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Корзина обновлена');
                    location.reload(); // Перезагружаем страницу
                } else {
                    console.error('Ошибка при обновлении корзины');
                }
            })
            .catch(error => console.error('Ошибка:', error));
    }

    document.getElementById('delete-button').addEventListener('click', function() {
        let productId = this.getAttribute('data-product-id');

        if (confirm('Вы уверены, что хотите удалить этот товар из корзины?')) {
            fetch(`/basket/remove/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Товар удалён из корзины');
                        location.reload();
                    } else {
                        alert('Ошибка при удалении товара');
                    }
                })
                .catch(error => console.error('Ошибка:', error));
        }
    });
</script>
