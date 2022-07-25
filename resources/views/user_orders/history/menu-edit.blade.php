@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/index.css') }}">
@endsection

@section('content')
    <!-- -------------------------------------------------------- -->
    <div class="slid">
        <div class="slid_box">
            <div class="slid_min_box">
                <div class="slid_item">
                    <form action="{{ route('userOrderMenuUpdate',['order'=>request('order'),'order_menu'=>request('order_menu')]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <select class="select" name="menu_id" onchange="changePrice()" id="select_menu">
                        <option disabled selected>выберите меню</option>
                        @foreach ($menu_lists as $list)
                        <option @if($list['id'] == $menu['menu_id']) selected @endif value="{{ $list['id'] }}" price="{{ $list['price'] }}">{{ $list['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="user_number">
                        <p class="user_number_text">Количество порций</p>
                        {{-- <div class="minus">-</div> --}}
                        <div class="number">
                            <input type="number" class="form-control" id="servings" value="{{ $menu['count'] }}" name="count" min="1" onchange="changePrice()">
                        </div>
                        {{-- <div class="plus">+</div> --}}
                    </div>
                    <div class="slid_price">
                        <span>Цена</span>
                        <span id="total_price">руб.</span>
                    </div>
                    <textarea name="comment" name="" id="" cols="30" rows="10" placeholder="Оставить комментарии" class="slid_textarea">{{ $menu['comment'] }}</textarea>
                    <button class="save_btn save_btn_02">Изменить</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
 function changePrice(){
        let menu = document.getElementById('select_menu');
        let menu_price = menu.options[menu.selectedIndex].getAttribute('price');
        let count = document.getElementById('servings').value;
        let total_price = menu_price * count;
        document.getElementById('total_price').innerHTML = total_price + ' руб.'

    }
    changePrice()
</script>
@endsection
