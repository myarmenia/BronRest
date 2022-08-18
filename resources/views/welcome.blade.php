<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <link rel="stylesheet" href="{{asset('css/alert_box.css')}}">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Restaurants</title>
</head>
<body>
    @if(request()->message)
    <div class="notify active"><span id="notifyType" class="success">{{ request()->message }}</span></div>
    <script src="{{ asset('js/alert_box.js') }}"></script>
    @endif
    <div class="bg_box">
        <img src="{{ asset('assets/images/banner.jpg') }}"  class="bg">
        <div class="header_nav">
          <div class="header_logo">
            <!-- <a href="#">Transitive <span>by TEMPLATED</span></a> -->
          </div>
          <div class="nav_flex">
            <ul>
              <li><a href="#" class="nav_link">О компании</a></li>
              <li><a href="#" class="nav_link">Условия сотрудничества</a></li>
              <li><a href="#" class="nav_link" onclick="openSliader()">Регистрациsя</a></li>
              <li><a href="#" class="nav_link" onclick="openSliader2()">Вход</a></li>
            </ul>
          </div>
          <div class="navbar">
            <div class="hamburger_menu">
              <div class="line line-1"></div>
              <div class="line line-2"></div>
              <div class="line line-3"></div>
            </div>
            <ul class="nav_list">
              <li class="nav_item">
                <a href="#" class="nav_link  nav_link_02">Tap Table</a>
              </li>
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
                <a href="#" class="nav_link" onclick="openSliader2()">Вход</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="mobail mobail002">
          <a href="#"> <img src="{{ asset('assets/images/store.png') }}"></a>
           <a href="#"><img src="{{ asset('assets/images/play.png') }}"></a>
         </div>


      </div>

      <div class="multifunctional">
        <div class="logo_box">
          <div class="img_logo">
            <img src="{{ asset('assets/images/logo002.png') }}" alt="">
          </div>
          <div class="hed_logo">
            Tap-Table
          </div>
        </div>
        <div class="logo_hed_text">
          Многофункциональное приложение <br> для управления рестораном
        </div>
        <div class="logo_text">
          Одно приложение для решения множества задач: от <br> организации бронирований до ведения статистики заведения.
        </div>
        <div class="mobail">
         <a href="#"> <img src="{{ asset('assets/images/store.png') }}"></a>
          <a href="#"><img src="{{ asset('assets/images/play.png') }}"></a>
        </div>
      </div>




          <!-- -------------------------------------------------------------------------------------------------- -->
      <section class="earn__box">
        <div class="container">
        <div class="earn">
          <h1 class="earn_title">С TapTable легко зарабатывать больше</h1>
          <div class="img_hed_box">
            <img src="{{ asset('assets/images/Frame.png') }}">
            <p>Вы больше не будете терять клиентов из-за пропущенных звонков и сообщений в соцсетях;</p>
          </div>
          <div class="img_hed_box">
            <img src="{{ asset('assets/images/Frame.png') }}">
            <p> с функцией “Свободный стол”  поток клиентов увеличится: заинтересованные клиенты получат уведомления об освободившихся местах; </p>
          </div>
          <div class="img_hed_box">
            <img src="{{ asset('assets/images/Frame.png') }}">
            <p>Tap-Table повышает возврат клиентов, формируя постоянных посетителей;</p>
          </div>
          <div class="img_hed_box">
            <img src="{{ asset('assets/images/Frame.png') }}">
            <p> приложение анализирует клиентов, цифровизируя их, что поможет снизить расходы на рекламу и создавать персональные предложения; </p>
          </div>
          <div class="img_hed_box">
            <img src="{{ asset('assets/images/Frame.png') }}">
            <p>функция предзаказа повышает трафик заведения: клиенты больше не ждут, приходя к уже готовому блюду․</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ---------------------------------------------------------------------------------------------------- -->
    <section class="restaurants__box">
      <div class="container">
        <div class="restaurants">
          <h1 class="earn_title">TapTable для ресторанов это</h1>
          <div class="information">
            <div class="max_box">
              <img src="{{ asset('assets/images/icone01.png') }}" class="icone__img">
              <h2 class="box_icone_title">Удобно</h2>
              <p class="box_icone_text">
                Простая схема управления бронированиями. Все детали заказа находятся в одном месте: от количества посетителей до комментариев к блюдам
              </p>
            </div>
            <div class="max_box">
              <img src="{{ asset('assets/images/icone02.png') }}" class="icone__img">
              <h2 class="box_icone_title">Выгодно</h2>
              <p class="box_icone_text">
                комиссия в 3 раза ниже, чем у популярных агрегаторов (8-10% с предзаказа на блюдо)
              </p>
            </div>
            <div class="max_box">
              <img src="{{ asset('assets/images/icone03.png') }}" class="icone__img">
              <h2 class="box_icone_title">Актуально</h2>
              <p class="box_icone_text">
                удовлетворяет растущий спрос на сервисы онлайн-бронирования. В 2022 году он вырос более чем на 50% по сравнению с прошлым годом
              </p>
            </div>
            <div class="max_box">
              <img src="{{ asset('assets/images/icone04.png') }}" class="icone__img">
              <h2 class="box_icone_title">Быстро</h2>
              <p class="box_icone_text">
                приложение экономит время персонала, повышая производительность труда
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- -------------------------------------------------------------------------------------------------------------- -->




    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section class="footer_max_box">
      <img src="{{ asset('assets/images/bg0003.jpg') }}" class="images0003">
      <div class="images0004">
        <h1 class="earn_title">функционал</h1>
        <div class="tip_rest">
        <div class="tip_text">Выбирайте тип заведения <br> и направление кухни</div>
        <img src="{{ asset('assets/images/Vector01.png') }}" alt="">
        <div class="tip_text">Создавайте меню для <br> онлайн-заказов блюд</div>
        <img src="{{ asset('assets/images/Vector02.png') }}" alt="">
        <div class="tip_text">Сделайте схему <br> расположения столов</div>
        <img src="{{ asset('assets/images/Vector03.png') }}" alt="">
        <div class="tip_text">Выводите деньги из приложения <br> сразу на счет заведения</div>
        <img src="{{ asset('assets/images/Vector04.png') }}" alt="">
        <div class="tip_text">Формируйте базу данных <br> своих клиентов</div>
        <img src="{{ asset('assets/images/Vector05.png') }}" alt="">
        <div class="tip_text">Oтслеживайте статистику <br> заказов</div>
        </div>

    </div>

      <div class="container">
        <footer class="footer">
          <div class="footer_box">
            <a href="#" class="footer_logo">Tap Table</a>
            <p class="green_text">Политика конфиденциальности</p>
          </div>
          <div class="footer_box">
          <p class="footer_p">Телефон</p>
          <a href="#" class="footer_a"> +374 96-10-10-17</a>
          </div>
          <div class="footer_box">
        <p class="footer_p">Адрес:</p>
        <p class="footer_p">Yerevan, Mashtoc Ave Sarmen 1 str.</p>
          </div>
        </footer>
      </div>
    </section>


    <!-- --------------------------------------------------------------- -->
    <div class="display_none" id="slider">
      <div class="registration">
          <div class="registration_box">
              <div class="reg_close" onclick="closeSliader()">
                  <img src="{{ asset('assets/images/close.png') }}">
              </div>
              <h1 class="reg_title">Регистрация</h1>
              <form action="/register" method="POST">
                @csrf
                <div class="reg_input_box">
                    <div class="reg_input">
                        <input type="text" placeholder="Имя" class="input_itme" name="name">
                        <input type="email" placeholder="Email" class="input_itme" name="email">
                        <input type="password" placeholder="Пароль" class="input_itme" name="password">
                        <input type="password" placeholder="Подтвердить пароль" class="input_itme" name="password_confirmation">

                        <div class="checkbox">
                            <input type="checkbox" />
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
    <div class="display_none" id="slider2" @if(request()->login) style="display: block;" @endif>
      <div class="registration">
          <div class="registration_box">
              <div class="reg_close" onclick="closeSliader2()">
                  <img src="{{ asset('assets/images/close.png') }}">
              </div>
              <h1 class="reg_title">вход</h1>
              <form action="/login" method="POST">
                @csrf
                <div class="reg_input_box">
                    <div class="reg_input">
                        <input type="email" placeholder="Email" class="input_itme" name="email">
                        <input type="password" placeholder="Пароль" class="input_itme" name="password">

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






