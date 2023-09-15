{!! Lte3::text('name') !!}
{!! Lte3::text('brand') !!}
{!! Lte3::text('article') !!}
{!! Lte3::number('old_price') !!}
{!! Lte3::number('price') !!}
{!! Lte3::text('slug') !!}
{!! Lte3::textarea('description', null, [
    'label' => 'Опис',
    'rows' => 3,
]) !!}

{!! Lte3::select2('category_id', isset($product) ? $product->category_id : null, $categories, [
    'label' => 'Категорії:',
    'field_name' => 'category_id',
    'placeholder_value' => 'Title',
]) !!}

<div id="attributs-container" style="display: none;">
    {!! Lte3::select2('attributs', null, $attributs, [
        'label' => 'Атрибути:',
        'multiple' => false,
        'id' => 'attributs',
    ]) !!}
    <div id="property-container" style="display: none;">
        {!! Lte3::text('value') !!}
    </div>
</div>



{!! Lte3::select2('seller_id', isset($product) ? $product->seller_id : null, $seller, [
    'label' => 'Продавець:',
    'field_name' => 'seller_id',
    'placeholder_value' => 'Title',
]) !!}

{!! Lte3::mediaFile('product_photo', $product ?? null, [
    'label' => 'Фото',
    'multiple' => true,
    'is_image' => true,
]) !!}

{!! Lte3::btnSubmit('Зберегти', null, null, ['add' => 'fixed']) !!}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Виберіть поле "Категорії" і додайте обробник подій при зміні вмісту поля.
        $('#category_id').change(function() {
            // Отримайте вибране значення поля "Категорії".
            var selectedCategoryId = $(this).val();

            // Визначте контейнер для поля "Атрибути".
            var attributsContainer = $('#attributs-container');

            // Перевірте, чи вибрана категорія, і відображайте або приховуйте поле "Атрибути".
            if (selectedCategoryId) {
                attributsContainer.show();
            } else {
                attributsContainer.hide();
            }
        });

        // Перевірте стан поля "Категорії" при завантаженні сторінки.
        $('#category_id').trigger('change');

        // Виберіть поле "Атрибути" за допомогою id "attributs" та додайте обробник подій при зміні вмісту поля.
        $('#attributs').change(function() {
            // Отримайте вибране значення поля "Атрибути".
            var selectedAttribut = $(this).val();

            // Визначте контейнер для поля "Властивість".
            var propertyContainer = $('#property-container');

            // Перевірте, чи вибрано атрибут, і відображайте або приховуйте поле "Властивість".
            if (selectedAttribut !== null) {
                propertyContainer.show();
            } else {
                propertyContainer.hide();
            }
        });

        // Перевірте стан поля "Атрибути" при завантаженні сторінки.
        $('#attributs').trigger('change');
    });
</script>
