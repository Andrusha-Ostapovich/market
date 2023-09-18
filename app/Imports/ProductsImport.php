<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductsImport implements ToModel, WithStartRow
{
    /**
     * Початковий рядок, з якого починається обробка
     */
    public function startRow(): int
    {
        return 2; // Починаємо з другого рядка (перший рядок - заголовки)
    }

    public function model(array $row)
    {
        // Отримайте значення з колонки "attribute"
        $photoUrls = explode(', ', $row[8]);


        // Перевірка наявності атрибутів у колонці "attribute"
        if (!empty($row[4])) {
            // Розділіть колонку "attribute" на окремі атрибути та їх значення
            $attributeColumn = $row[4]; // Припустимо, що це колонка "attribute" у вашому файлі Excel
            $attributePairs = explode(' | ', $attributeColumn);

            // Створіть порожні масиви для атрибутів та їх значень
            $attributes = [];
            $values = [];

            // Пройдіться по кожній парі атрибут:значення
            foreach ($attributePairs as $pair) {
                // Розділіть пару на атрибут та значення
                list($attribute, $value) = explode(': ', $pair);

                // Додайте атрибут та значення до відповідних масивів
                $attributes[] = $attribute;
                $values[] = $value;
            }
        } else {
            // Якщо атрибути відсутні, залиште масиви порожніми
            $attributes = [];
            $values = [];
        }

        // Шукаємо категорію за назвою
        $category = Category::firstOrCreate(['name' => $row[7]]);

        // Створюємо продукт
        $product = new Product([
            'attributes' => implode(', ', $attributes), // Зберігаємо атрибути у вигляді рядка
            'values' => implode(', ', $values),  // Зберігаємо ID значень атрибутів у вигляді рядка
            'name' => $row[0],
            'description' => $row[9],
            'price' => $row[2],
            'old_price' => $row[3],
            'article' => $row[1],
            'brand' => $row[6],
            'category_id' => $category->id,
            'seller_id' => $row[10], // Замініть це на правильне поле продавця
        ]);

        $product->save();

        foreach ($photoUrls as $photoUrl) {
            if ($photoUrl) {
                // Додаємо фото до колекції "product_photo"
                $product->addMediaFromUrl($photoUrl)->toMediaCollection('product_photo');
            }
        }

        return $product;
    }
}
