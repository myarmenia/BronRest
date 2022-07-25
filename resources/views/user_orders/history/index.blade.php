@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/index.css') }}">
@endsection

@section('content')
   <div class="big-box">
        <div class="container">
            <div class="intelligence">
                @if(count($data))
                    <div class="intelligence_box">
                        <div class="intelligence_header">
                            <h1>Сведения</h1>
                            <a href="#">+ Добавить в ручную</a>
                        </div>
                        <div class="booking_date">
                            <div class="booking_hed">
                                Зал {{ request('hall') }}, Стол {{ request('x') . ' ' . request('x') }}
                                {{-- {{ $data['hall_name'] }} --}}
                            </div>
                            <div class="flex">
                                <span>Дата брони</span>
                                <div class="date">
                                    {{-- <img src="{{ asset('assets/images/date.png') }}"> --}}
                                    <input type="date" value="{{ request('date') }}" onchange="changeDate(this.value)">
                                </div>
                            </div>

                        </div>
                        <div class="booking_hours">
                            <h1>Часы бронирования</h1>
                            <div class="booking_time">
                                @foreach ($data as $dat)
                                <input type="time" value="{{ Carbon\Carbon::parse($dat['coming_date'])->format('H:i') }}">
                                @endforeach
                            </div>
                        </div>
                        <div class="free_tables">
                            <h1>Забронировано</h1>
                            @foreach ($data as $dat)
                            <div class="booked">
                                <div class="booked_numbr">
                                    <p>№{{ $dat['id'] }}</p>
                                </div>
                                <div class="booked_time">
                                    <p>{{ Carbon\Carbon::parse($dat['coming_date'])->format('H:i') }}</p>
                                </div>
                                <div class="booked_user">
                                    <img src="{{ asset('assets/images/users.png') }}">
                                    <p>{{ $dat['people_nums'] }}</p>
                                </div>
                                <div class="booked_name">
                                    <p>{{ $dat['user']->name }}</p>
                                </div>
                                <div class="booked_phone">
                                    <a>{{ $dat['user']->phone_number }}</a>
                                </div>
                                <div class="booked_menu">
                                    <p>+ Меню</p>
                                </div>
                                <div class="booked_opl">
                                    <p> {{ $dat['status'] ? 'Опл.' : 'Не опл.'}}</p>
                                </div>
                                <div class="booked_img">
                                    <a href="{{ route('userOrderHistorySingle',$dat['id'] ) }}">
                                        <img src="{{ asset('assets/images/pen.png') }}">
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                @endif
                {{-- <div class="intelligence_box">
                    <div class="intelligence_header">
                        <h1>Изменить №3 бронь</h1>
                    </div>
                    <div class="input_box">
                        <div class="input_items input_items_02">
                            <!-- <select class="select">
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                            </select> -->
                            <div class="date date_02">
                                <img src="images002/date.png">
                                <input type="date">
                            </div>
                            <div class="select timages002/pen01.pngim                           <img src=" images002/time.>
                                <input type="time" class="selectimages002/deled.png select_02">
                            </div>
                            <input type="text" class="select" placeholder="Имя">
                            <!-- <input type="tel" placeholder="+7 ХХХ ХХХХ ХХХ" class="select"> -->
                        </div>
                        <div class="input_items">
                            <select class="select">
                                <option value="">Оплачено</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                                <option value="">Зал 1</option>
                            </select>
                            <div class="not_paid">
                                <p>Не оплачено</p>
                                <p>Не пришел</p>
                            </div>
                            <!-- <input type="text" class="select" placeholder="Номер стола: 9"> -->
                            <!-- <div class="select time">
                                <img src="images002/time.png" alt="">
                                <input type="time" class="select select_02">
                            </div> -->
                            <!-- <input type="text" class="select" placeholder="Имя"> -->
                        </div>

                    </div>
                    <div class="box_user_number">

                        <div class="user_number">
                            <div class="minus">-</div>
                            <div class="number">4</div>
                            <div class="plus">+</div>
                            <div class="user_number_img"><img src="images002/users.png"></div>
                        </div>
                        <div class="box_user_btn_item">
                            <button class="box_user_btn">Сохранить</button>
                        </div>
                    </div>
                    <div class="save">
                        <div class="save_menu">
                            <a href="#">+7 XXX XXXX XXX</a>
                            <button>+Меню</button>
                        </div>
                        <div class="save_cancel">
                            <button class="save_btn save_btn_02">Закрыть бронь</button>
                            <button class="save_btn save_btn_03">Отменить</button>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
    <!-- -------------------------------------------------------- -->
    {{-- <div class="slid">
        <div class="slid_box">
            <div class="slid_min_box">
                <div class="slid_item">
                    <select class="select">
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                    </select>
                    <select class="select">
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                    </select>
                    <div class="user_number">
                        <p class="user_number_text">Количество порций</p>
                        <div class="minus">-</div>
                        <div class="number">4</div>
                        <div class="plus">+</div>
                    </div>
                    <div class="slid_price">
                        <span>Цена</span>
                        <span>700 руб.</span>
                    </div>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Оставить комментарии" class="slid_textarea"></textarea>
                    <button class="save_btn save_btn_02">Добавить</button>
                </div>
                <div class="slid_item slid_item_02">
                    <div class="slid_item_box">
                        <div class="slid_item_text">Название Блюда</div>
                        <div class="slid_item_numbr">1</div>
                        <div class="slid_item_img">
                            <img src="images002/pen01.png">
                            <img src="images002/deled.png">
                        </div>
                    </div>
                    <div class="slid_item_box">
                        <div class="slid_item_text">Название Блюда</div>
                        <div class="slid_item_numbr">1</div>
                        <div class="slid_item_img">
                            <img src="images002/pen01.png">
                            <img src="images002/deled.png">
                        </div>
                    </div>
                    <div class="pay">
                        <p>Общее: 8 000 рублей</p>
                        <p>Плата за обслуживание Х%: 800 рублей </p>
                    </div>
                    <p class="payment">К оплате 8 800 рублей</p>
                    <div class="slid_btn">
                        <button class="btn_002 btn_001">Сохранить</button>
                        <button class="btn_002">Отменить</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('js')
<script>
function changeDate(paramValue){
    paramName = 'date'
    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');
    if (url.indexOf(paramName + "=") >= 0) {
        var prefix = url.substring(0, url.indexOf(paramName + "="));
        var suffix = url.substring(url.indexOf(paramName + "="));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
    } else {
        if (url.indexOf("?") < 0)
            url += "?" + paramName + "=" + paramValue ;
        else
            url += "&" + paramName + "=" + paramValue ;
    }
    window.location.href = url + hash;
}
</script>
@endsection
