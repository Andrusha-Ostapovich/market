<footer class="footer-section">
    <div class="container relative">
        <form method="POST" action="{{ route('mailing') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center">
                            <i class="fas fa-envelope me-3 fa-3x"></i>
                            <span class="fs-4">Хочеш знати про оновлення першим?</span>
                        </h3>
                        {!! Lte3::text('name') !!}
                        {!! Lte3::text('email') !!}
                        <br>
                        {!! Lte3::btnSubmit(null, null, null, ['class' => 'fa fa-paper-plane']) !!}
                        <br><br>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <h5><i class="icon fas fa-check"></i> Excellent!</h5>
                                {{ $message }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </form>


        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
                <p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus
                    malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.
                    Pellentesque habitant</p>

                <ul class="list-unstyled custom-social">
                    <li><a href="{{ \Variable::get('facebook') }}"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="{{ \Variable::get('twitter') }}"><span class="fa fa-brands fa-twitter"></span></a></li>
                    <li><a href="{{ \Variable::get('instagram') }}"><span class="fa fa-brands fa-instagram"></span></a></li>
                    <li><a href="{{ \Variable::get('linkedin') }}"><span class="fa fa-brands fa-linkedin"></span></a></li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="row links-wrap">
                    <div class="col-6 col-sm-6 col-md-3">
                        <ul class="list-unstyled">
                            <li><a href="/about">Про нас</a></li>
                            <li><a href="/catalog">Каталог</a></li>
                            <li><a href="/news">Новини</a></li>
                            <li><a href="/contacts">Контакти</a></li>
                        </ul>
                    </div>


                </div>
            </div>

        </div>

        <div class="border-top copyright">
            <div class="row pt-4">
                <div class="col-lg-6">
                    <p class="mb-2 text-center text-lg-start">Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved. &mdash; Designed with love by <a
                            href="https://untree.co">Untree.co</a> Distributed By <a
                            hreff="https://themewagon.com">ThemeWagon</a>
                        <!-- License information: https://untree.co/license/ -->
                    </p>
                </div>

                <div class="col-lg-6 text-center text-lg-end">
                    <ul class="list-unstyled d-inline-flex ms-auto">
                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
</footer>
