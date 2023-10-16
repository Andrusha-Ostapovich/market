@extends('client.layouts.app')
@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Замовлення</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    @if (!auth()->check())
                        <div class="border p-4 rounded" role="alert">
                            Постійний клієнт? <a href="/login">натисни на мене</a>, щоб увійти
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Адреса Відправки</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        {!! Lte3::formOpen(['action' => route('place'), 'model' => null, 'method' => 'POST']) !!}


                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Ім'я <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="name">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Прізвище <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="surname">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="c_country" class="text-black">Населений пункт та вулиця<span
                                    class="text-danger">*</span></label>
                            <select id='settlements' class="select2" style="width: 100%;" name='settlement'></select>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Ваше Замовлення</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Продукт</th>

                                        <th>Сума</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <td class="product-name">
                                                    {{ $cartItem->product->name }} x{{ $cartItem->quantity }}
                                                </td>



                                                <td class="product-price">
                                                    {{ $cartItem->product->price }}
                                                </td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Сума замовлення</strong>
                                            </td>
                                            <td class="text-black font-weight-bold">
                                                <strong>{{ number_format(\Cart::total($cartItems), 2) }}</strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank"
                                            role="button" aria-expanded="false" aria-controls="collapsebank">Прямий
                                            банківський переказ</a></h3>

                                    <div class="collapse" id="collapsebank">
                                        <div class="py-2">
                                            <p class="mb-0">Зробіть платіж безпосередньо на наш банківський рахунок. Будь
                                                ласка, використовуйте свій ідентифікатор замовлення як платіжну довідку.
                                                Ваше замовлення не буде відправлено, доки кошти не будуть звільнені на
                                                нашому рахунку.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque"
                                            role="button" aria-expanded="false" aria-controls="collapsecheque">Оплата
                                            чеком</a></h3>

                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2">
                                            <p class="mb-0">Зробіть платіж безпосередньо на наш банківський рахунок. Будь
                                                ласка, використовуйте свій ідентифікатор замовлення як платіжну довідку.
                                                Ваше замовлення не буде відправлено, доки кошти не будуть звільнені на
                                                нашому рахунку.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3 mb-5">
                                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal"
                                            role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a>
                                    </h3>

                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2">
                                            <p class="mb-0">Зробіть платіж безпосередньо на наш банківський рахунок. Будь
                                                ласка, використовуйте свій ідентифікатор замовлення як платіжну довідку.
                                                Ваше замовлення не буде відправлено, доки кошти не будуть звільнені на
                                                нашому рахунку.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Lte3::btnSubmit('Оплата', null, null) !!}
                                </div>
                                {!! Lte3::formClose() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </div>
    </div>


    <script>
        $('#settlements').select2({
            ajax: {
                url: 'http://market/suggest/settlements?q=',
                dataType: 'json',
                delay: 250,
            },
            placeholder: 'Пошук населеного пункту',
            minimumInputLength: 2
        });
    </script>
@endsection
