@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/main.css') }}">
@endsection



@section('content')
<div class="container">
    @if(count($datas))
        @foreach($datas as $data)
            <div class="content_box">
                <div class="hed">
                    <h1 class="title_01">Сведения</h1>
                </div>
                <h1 class="title_01 title_02">
                    {{ $data['name'] }}
                </h1>
                @foreach ($data->floor_planes as $floor)
                <div class="div_title">
                    <span class="title_table">Зал</span>
                    <span class="title_table">{{ $floor['hall_name'] }}</span>
                </div>

                @if(count(json_decode($floor['data_json'],1)))
                <div class="table">
                    {{-- <h1 class="tab">test</h1> --}}
                    <div class="table_tab">
                        @foreach(json_decode($floor['data_json'],1) as $table)
                        @continue(!count($table))
                            <a href="{{ route('userOrderHistory',['x'=>$table["x"],'y'=>$table["y"],'hall'=>$floor['id']]) }}">
                                {{-- x - {{ $table["x"] }}
                                y - {{ $table["y"] }} --}}
                                {{isset($table["table_number"]) ? $table["table_number"] . ' столик' : null }}
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@endsection

@section('js')

@endsection

