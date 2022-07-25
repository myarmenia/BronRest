@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/index.css') }}">
@endsection

@section('content')
   <div class="big-box">
        <div class="container">
            <div class="intelligence">
                @if(count($datas))
                @foreach($datas as $data)
                    <div class="intelligence_box">
                        {{-- <div class="intelligence_header">
                            <h1>Сведения</h1>
                            <a></a>
                        </div> --}}
                        <div class="booking_date">
                            <div class="booking_hed">
                                {{ $data['name'] }}
                            </div>

                        </div>
                        <div class="booking_hours">
                            <h1>Залы</h1>
                            <div class="booking_time">
                                @foreach ($data->floor_planes as $floor)
                                    <h1>{{ $floor['hall_name'] }}</h1>
                                    @if(count(json_decode($floor['data_json'],1)))
                                    <ul>
                                        @foreach(json_decode($floor['data_json'],1) as $table)
                                        @continue(!count($table))
                                        <li>
                                            <a href="{{ route('userOrderHistory',['x'=>$table["x"],'y'=>$table["y"],'hall'=>$floor['id']]) }}">
                                                x - {{ $table["x"] }}
                                                y - {{ $table["y"] }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif

@endsection

@section('js')

@endsection

