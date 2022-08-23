@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/main.css') }}">
@endsection



@section('content')

@if(Session::has('history'))
<div class="alert alert-danger" role="alert" id="alert-box">
   {{ Session::get('history') }}
  </div>
@endif

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

                @if(count($floor->tables))
                <div class="table">
                    {{-- <h1 class="tab">test</h1> --}}
                    <div class="table_tab">
                        @foreach($floor->tables as $table)
                            <a href="{{ route('userOrderHistory',['table_id'=>$table->id]) }}">
                                {{-- x - {{ $table["x"] }}
                                y - {{ $table["y"] }} --}}
                                столик {{ $table->number }}
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
<script>
setTimeout(() => {
    document.getElementById('alert-box').remove()
}, 3000);
</script>
@endsection
