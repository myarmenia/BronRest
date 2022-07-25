@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/index.css') }}">
@endsection

@section('content')
   <div class="big-box">
    <form action="{{ route('userOrderHistorySingleStore',$order['id']) }}" method="POST">
        @csrf
        <div class="container">
            <div class="intelligence">

                <div class="intelligence_box">
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
                                {{-- <img src="{{ asset('assets/images/date.png') }}"> --}}
                                <input type="datetime-local" value="{{ $order['coming_date'] }}" name="coming_date">
                            </div>
                            {{-- <div class="select timages002/pen01.pngim                           <img src=" images002/time.>
                                <input type="time" class="selectimages002/deled.png select_02">
                            </div> --}}
                            {{-- <input type="text" class="select" placeholder="Имя" name="name"> --}}
                            <!-- <input type="tel" placeholder="+7 ХХХ ХХХХ ХХХ" class="select"> -->
                        </div>
                        <div class="input_items">
                            <select class="select" name="status">
                                <option value="1" @if($order['status']) selected @endif>Оплачено</option>
                                <option value="0" @if(!$order['status']) selected @endif>Не Оплачено</option>
                            </select>
                            {{-- <div class="not_paid">
                                <p>Не оплачено</p>
                                <p>Не пришел</p>
                            </div> --}}
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
                            {{-- <div class="number">4</div> --}}
                            <input type="text" class="number form-control" value="{{ $order['people_nums'] }}" name="people_nums">
                            <div class="plus">+</div>
                            <div class="user_number_img"><img src="{{ asset('assets/images/users.png') }}"></div>
                        </div>
                        <div class="box_user_btn_item">
                            <button class="box_user_btn">Сохранить</button>
                        </div>
                    </div>
                    <div class="save">
                        <div class="save_menu">
                            <a href="#">
                                {{ $order->user->phone_number }}
                            </a>
                            <button type="button" onclick="location.href = '{{ route('userOrderMenu',$order['id']) }}'">+Меню</button>
                        </div>
                        <div class="save_cancel">
                            {{-- <button class="save_btn save_btn_02">Закрыть бронь</button> --}}
                            <button type="button" onclick="location.href = '{{ URL::previous() }}'" class="save_btn save_btn_03" >Отменить</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
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

@endsection
