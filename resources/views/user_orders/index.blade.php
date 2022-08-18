@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/index.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>
                    Заказы пользователей
                </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-primary">
            <p>{{ $message }}</p>
        </div>
    @endif


    {{-- <table class="table table-bordered mt-3">
        <tr>
            <th>
                Электронная почта пользователя
            </th>
            <th>
                Время подхода
            </th>
            <th>
                Число людей
            </th>

            <th width="280px">Действие</th>
        </tr>
        @foreach ($orders as $key => $data)
            <tr>
                <td>{{ $data->user['email'] }}</td>
                <td>{{ $data->coming_date }}</td>
                <td>{{ $data->people_nums }}</td>
                <td>
                        <a href="{{ route('userShow',['id' => $data->id]) }}" class="btn btn-primary">
                            Редактировать
                        </a>
                </td>
            </tr>
        @endforeach
    </table> --}}
    @if(count($orders))
    <div class="container">
        @foreach ($orders as $key => $order)
        <div class="container_content">
            <input type="date">

            <div class="content_box">
                <div class="content_clos">
                    <img src="{{ asset('assets/images/Group-1264.png') }}">
                </div>
                <div class="content_item">
                    <div class="content_room_booking">
                        <div class="content_room">

                        </div>
                        <div class="content_booking">
                            <ul>
                                <li>Бронирование столика</li>
                                @foreach ($order->floors as $floor)

                                    <li> Столик <span>{{'№ ' . $floor->floor_plane_table_id . ', Зал ' .$floor->floor_plane_id  }}</span></li>
                                @endforeach
                                <li>Дата: <span>{{ $order->coming_date }}</span></li>
                                <li>Время: <span>18:30</span></li>
                                <li>Кол. чел. <span>{{ $order->people_nums }}</span></li>
                                <li>Имя: {{ $order->user['name'] }}</li>
                                <li>Тел.: {{ $order->user['phone_number'] }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="content_menu">
                        <ul>
                            <li>Меню: </li>
                            @if($order['menus'])
                                @foreach ($order['menus'] as $menu)
                                <li>{{ $menu['name'] }}  - {{ $menu['count'] }} порция,</li>
                                <li>{{ $menu['comment'] }} </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="button">
                    {{-- <button class="btn">Отменить</button>
                    <button class="btn">Подтвердить</button> --}}
                    <form method="POST" action="{{ route('userOrderStore',$order['id'])}}">
                        @csrf
                      @if(count($causes))
                      <div class="form-group">
                        <select class="form-control" name="cause">
                        <option value="0" selected disabled>Выбирать</option>
                        @foreach($causes as $cause)
                        <option value="{{ $cause['id'] }}" @if($cause['id'] == $order['status']) selected @endif>
                            {{ $cause['name'] }}
                        </option>
                        @endforeach
                        </select>
                        </div>
                    @endif
                        <button class="btn btn-warning">
                        Отправить
                    </button>
                      </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endif

    {!! $orders->links("pagination::bootstrap-5") !!}

@endsection
