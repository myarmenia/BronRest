<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Restaurants</title>
</head>
<body>

    <!-- ---------------------- -->

<div class="background">
    <img src="{{route('getFile',['path' => 'public/main_images/banner.jpg'])}}"></div>

        <header class="header">
            <nav class="navbar">
                <a href="#" class="nav_branding">Tap Table</a>
                <ul class="nav_menu">
                    <a href="#" class="nav_branding nav_branding2">Tap Table</a>
                    @if(Auth::check())
                    <li class="nav_item">
                        <a href="{{route('home')}}" class="nav_link">Профиль</a>
                    </li>
                    @endif
                    <li class="nav_item">
                        <a href="#" class="nav_link">О компании</a>
                    </li>
                    <li class="nav_item">
                        <a href="#" class="nav_link">Условия сотрудничества</a>
                    </li>
                    <li class="nav_item">
                        <a href="#" class="nav_link" onclick="openSliader()">Регистрация</a>
                    </li>
                    <li class="nav_item">
                        <a href="#" class="nav_link" onclick="openSliader2()">вход</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </header>
        <!-- //////// -->
        <div class="hed_text_box">
            <h1 class="het_title">Lorem ipsum</h1>
            <p class="hed_text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Nunc in convallis odio. Aliquam erat volutpat. Vivamus accumsan interdum
                eros non dignissim. Vivamus magna sem, lacinia blandit  ultricies quis, sagittis in orci. Duis et pulvinar lectus,  ut tempus leo. Ut at dui lorem.Lorem ipsum dolor sit amet, consectetur
            </p>
            <br>
            <br>
            <br>


            <div class="epp_google">
            <p class="hed_text">magna sem, lacinia blandit ultricies </p>

                <a href="/"><img src="{{route('getFile',['path' => 'public/main_images/App_Store.png'])}}"></a>
                <a href="/"><img src="{{route('getFile',['path' => 'public/main_images/Google_Play.png'])}}"></a>

            </div>
        </div>

        <div class="epp_google_2">
            <p class="hed_text">magna sem, lacinia blandit ultricies </p>
                 <div class="stor_play">
                    <a href="/"><img src="{{route('getFile',['path' => 'public/main_images/App_Store.png'])}}"></a>
                    <a href="/"><img src="{{route('getFile',['path' => 'public/main_images/Google_Play.png'])}}"></a>
                 </div>


            </div>


    <!-- ------------------------------------------------------------------------------------------ -->


    <div class="about_company">
        <h1 class="company_title">О компании</h1>
        <p class="company_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. <br> Vivamus accumsan interdum eros non dignissim. Vivamus magna sem, lacinia blandit ultricies quis, <br> sagittis in orci. Duis et pulvinar lectus, ut tempus leo. Ut at dui lorem.Lorem ipsum dolor sit amet, consectetur </p>
        <p>Lorem ipsum dolor sit amet, consectetur</p>
    </div>


<!-- ----------------------------------------------------------------------------------------------- -->




<!-- ----------------------------------------------------- -->
<div class="div_flex">
    <div class="came">
        <img src="images/Mask group.jpg" >
    </div>
    <div class="cooperation">
        <div class="container">
            <h1 class="company_title">Условия сотруднечества</h1>
                <div class="cooperation_box_div">
                    <div class="cooperation_box">
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                        <div class="cooperatio_text_box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in convallis odio. Aliquam erat volutpat. </p>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>




<!-- ------------------------------------------------------------------------------------------------------------- -->
<div class="footer">
    <div class="container">
        <div class="footer_box">
            <div class="footer_itme">
                <a href="#" class="nav_branding nav_branding_footer">Tap Table</a>
                <p class="footer_text">Политика конфиденциальности</p>
            </div>
            <div class="footer_itme">
                <p>Телефон</p>
                <p> +374 96-10-10-17</p>
            </div>
            <div class="footer_itme">
                <p> Адрес:</p>
                <p>Yerevan, Mashtoc AveSarmen 1 str.</p>
            </div>
        </div>
    </div>
</div>


<!-- --------------------------------------------------------------- -->
<div class="display_none" id="slider">
    <div class="registration" >
        <div class="registration_box">
            <div class="reg_close" onclick="closeSliader()">
                <img src="{{route('getFile',['path' => 'public/main_images/close.png'])}}" >
            </div>
            <h1 class="reg_title">Регистрация</h1>
            <form method="POST" action="{{route('register')}}">
                @csrf
            <div class="reg_input_box">
                <div class="reg_input">
                    <input type="text"  placeholder="Имя" class="input_itme" name="name" required>
                    <input type="email" placeholder="Email" class="input_itme" name="email" required>
                    <input type="password" placeholder="Пароль" class="input_itme" name="password" required>
                    <input type="password" placeholder="Подтвердить пароль" class="input_itme" name="password_confirmation" required>

                    <div class="checkbox">
                     <input type="checkbox"  />
                     <label for="check">Запомнить</label>
                    </div>

                    <button class="itme_btn">Зарегистрироватся</button>


                </div>
            </div>
            </form>
        </div>

     </div>
</div>


<!-- --------------------------------------- -->
<div class="display_none" id="slider2">
    <div class="registration" >
        <div class="registration_box">
            <div class="reg_close" onclick="closeSliader2()">
                <img src="{{route('getFile',['path' => 'public/main_images/close.png'])}}" >
            </div>
            <h1 class="reg_title">вход</h1>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="reg_input_box">
                <div class="reg_input">
                    <input type="email" placeholder="Email" class="input_itme" name="email" required>
                    <input type="password" placeholder="Пароль" class="input_itme" name="password" required>

                    <button class="itme_btn itme_btn2">вход</button>
                </div>
            </div>
        </form>
        </div>

     </div>
</div>




    <script src="{{asset('js/welcome.js')}}"></script>
</body>
</html>
