<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithColumnWidths, WithMapping
{
    /**
     * Получаем все заказы для экспорта
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Order::with(['user', 'product'])->get();  // Загружаем заказы с пользователями и продуктами
    }

    /**
     * Заголовки столбцов для Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID заказа',
            'Дата создания',
            'Общая сумма',
            'Количество',
            'Статус',
            'Имя покупателя',
            'Email покупателя',
            'Название продукта',
            // Добавьте другие поля по мере необходимости
        ];
    }

    /**
     * Для автоширины колонок
     *
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 10, // ID заказа
            'B' => 20, // Дата создания
            'C' => 15, // Общая сумма
            'D' => 10, // Количество
            'E' => 12, // Статус
            'F' => 20, // Имя покупателя
            'G' => 25, // Email покупателя
            'H' => 30, // Название продукта
        ];
    }

    /**
     * Маппинг данных в Excel
     *
     * @param Order $order
     * @return array
     */
    public function map($order): array
    {
        return [
            $order->id,
            $order->created_at->format('d.m.Y H:i'),
            $order->product->price * $order->count,  // Общая сумма, например, цена продукта * количество
            $order->count,
            $order->status ?? 'Не указан',  // Если статус не установлен, выводим 'Не указан'
            $order->user->name,  // Имя покупателя
            $order->user->email,  // Почта покупателя
            $order->product->name,  // Название продукта
        ];
    }
}
