@extends('adminlte::page')
@section('content')

<div class="card">
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
                            <input class="form-control quantity-chair text-center" type="number" name="mm-2" placeholder="quantity chair" required="true" aria-required="true" aria-invalid="true"
                                   value="{{$item['quantity_chair']}}" disabled>
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
<div class="card">
    <div class="card-header">
      <h3 class="card-title">
          {{ $order->user['email'] }}
      </h3>
      <div class="card-tools">
        {{-- <span class="badge badge-primary">Label</span> --}}
      </div>
    </div>
    <div class="card-body">
        <p>Число людей: {{ $order->people_nums }}</p>
        <p>Время подхода: {{ $order->coming_date }}</p>
    </div>
    <div class="card-footer">

    </div>
  </div>

  <div class="card">
    <div class="card-header">
        Меню
    </div>
    <div class="card-body">
        @if($order['menus'])
        @foreach ($order['menus'] as $menu)
        <p>
            <span>
                <img src="{{ route('getFile',['path' => $menu['img']]) }}" alt="" width="40">
            </span>
            {{ $menu['name'] }} - {{ $menu['count'] }}
        </p>
        @endforeach
        @endif
    </div>
    <div class="card-footer">

    </div>
  </div>
  <form method="POST" action="{{ route('userOrderStore',$order['id'])}}">
    @csrf
  @if(count($causes))
  <div class="form-group">
    <label>Выбирать</label>
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
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/floor-plan/create-floor-plan.css') }}">
@stop

@section('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('js/floor-plan/drag-drop.js') }}"></script>
    <script src="{{ asset('js/floor-plan/script.js') }}"></script>
    <script src="{{ asset('js/floor-plan/edit.js') }}"></script> --}}
@endsection
