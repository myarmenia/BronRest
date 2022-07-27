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
                            @if(isset($order) && $order['floors'])
                            @foreach ($order['floors'] as $data)
                            <div class="tbl-div" style="background-image: url({{route('getFile',['path' => $data['img']])}}); background-repeat: no-repeat; background-size: cover">
                            <table id="table" class="tbl">
                                @for($y=0;$y<$data['table_y'];$y++)
                                <tr id="id-{{$y}}" class="some-class">
                                    @for($x=0;$x<$data['table_x'];$x++)
                                    <td class='some-td ui-droppable' data-x={{$x}} data-y={{$y}}
                                        style="width: {{500/$data->table_x}}px; height: {{500/$data->table_y}}px">
                                        @foreach(json_decode($data['data_json'],true) as $item)
                                            @if (isset($item['y']) && isset($item['x']) && $y==$item['y'] && $x==$item['x'])
                                                <div class="ui-widget-content ui-corner-tr mr-4 ui-draggable ui-draggable-handle @if($item['y'] == $data['y'] && $item['x'] == $data['x']) ordered @endif">
                                                    {{-- <div class="w-100 text-right x px-3">x</div> --}}
                                                    <img src="{{route('getFile',['path' => 'public/restaurant/images-tables/' . $item['img']])}}" class="img-table" data-name="{{$item['img']}}" style="width: 60%;">
<<<<<<< HEAD
                                                    <input class="form-control quantity-chair text-center" type="number" name="mm-2" placeholder="количество стул" required="true" aria-required="true" aria-invalid="true"
                                                    value="{{$item['quantity_chair']}}" disabled>
                                                    <input class="form-control table-number text-center" type="number" name="tn-2" placeholder="номер стола" required="true" aria-required="true" aria-invalid="true"
                                                    value="{{$item['table_number'] ?? null}}" disabled>
=======
                                                    <input class="form-control quantity-chair text-center" type="number" name="mm-2" placeholder="quantity chair" required="true" aria-required="true" aria-invalid="true"
                                                           value="{{$item['quantity_chair']}}" disabled>
>>>>>>> dev
                                                </div>
                                                @endif
                                        @endforeach
                                    </td>
                                    @endfor
                                </tr>
                                @endfor
                            </table>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <div class="content_booking">
                            <ul>
                                <li>Бронирование столика</li>
                                {{-- <li> Столик <span>№ 5, Зал 3</span></li> --}}
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
