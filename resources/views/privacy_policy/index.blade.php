<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/privacy-policy/index.css') }}">
    <title>Privacy Policy</title>
</head>
<body>

<div class="container">
    <div class="content_box">
    <div class="deta">
        <a href="?p">
            <div class="information">
                <div class="f88ddd">
                    <p class="i111uy">
                        ПОЛИТИКА КОНФИДЕНЦИАЛЬНОСТИ ДЛЯ МОБИЛЬНОГО ПРИЛОЖЕНИЯ
                        "TAPTABLE"
                    </p>
                    {{-- <p class="i111po">test2</p> --}}
                </div>
                <div class="f88img">
                    <img src="{{ asset('assets/images/right.webp') }}" alt="">
                </div>
            </div>
        </a>

        <a href="?p=1">
            <div class="information">
                <div class="f88ddd">
                    <p class="i111uy">
                        ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ ДЛЯ ПРИЛОЖЕНИЯ
                    </p>
                    {{-- <p class="i111po">test2</p> --}}
                </div>
                <div class="f88img">
                    <img src="{{ asset('assets/images/right.webp') }}" alt="">
                </div>
            </div>
        </a>

        <a href="?p=2">
            <div class="information">
                <div class="f88ddd">
                    <p class="i111uy">
                        Правила сотрудничества с ресторанами
                    </p>
                    {{-- <p class="i111po">test2</p> --}}
                </div>
                <div class="f88img">
                    <img src="{{ asset('assets/images/right.webp') }}" alt="">
                </div>
            </div>
        </a>

        <a href="?p=3">

            <div class="information">
                <div class="f88ddd">
                    <p class="i111uy">Согласие на обработку персональных данных физических лиц
                    </p>
                    {{-- <p class="i111po">test2</p> --}}
                </div>
                <div class="f88img">
                    <img src="{{ asset('assets/images/right.webp') }}" alt="">
                </div>
            </div>
        </a>
    </div>
    <div class="x-line"></div>
    @include('privacy_policy.slider.slider' . request('p'))
    </div>
</div>

</body>
</html>
