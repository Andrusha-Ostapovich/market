

</html>
@can('view', $user)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>User</title>
</head>

<body>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Додому</font>
                            </font>
                        </a></li>
                    <li><a href="#" class="nav-link px-2 text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Особливості</font>
                            </font>
                        </a></li>
                    <li><a href="#" class="nav-link px-2 text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Ціноутворення</font>
                            </font>
                        </a></li>
                    <li><a href="#" class="nav-link px-2 text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Поширені запитання</font>
                            </font>
                        </a></li>
                    <li><a href="#" class="nav-link px-2 text-white">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Про нас</font>
                            </font>
                        </a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Пошук..."
                        aria-label="Пошук">
                </form>

                <div class="text-end">
                    <button type="button" class="btn btn-outline-light me-2">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Логін</font>
                        </font>
                    </button>
                    <button type="button" class="btn btn-warning">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Зареєструватися</font>
                        </font>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold text-body-emphasis"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Скріншот по центру</font></font></h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Швидко створюйте та налаштовуйте адаптивні мобільні сайти за допомогою Bootstrap, найпопулярнішого у світі зовнішнього набору інструментів із відкритим вихідним кодом, що включає змінні Sass і міксини, адаптивну сіткову систему, велику кількість попередньо зібраних компонентів і потужні плагіни JavaScript.</font></font></p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Основна кнопка</font></font></button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Вторинний</font></font></button>
      </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
      <div class="container px-5">

      </div>
    </div>
  </div>
</body>

</html>

@else
@abort(403);
@endcan
