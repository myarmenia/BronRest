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
                    <form action="{{ route('orderMenuStore',request('order')->id) }}" method="POST">
                        @csrf
                    {{-- <select class="select">
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                        <option value="">Зал 1</option>
                    </select> --}}
                    <select class="select" name="menu_id" onchange="changePrice()" id="select_menu">
                        <option disabled selected>выберите меню</option>
                        @foreach ($menu_lists as $list)
                        <option value="{{ $list['id'] }}" price="{{ $list['price'] }}">{{ $list['name'] }}</option>
                        @endforeach
                    </select>
                    <div class="user_number">
                        <p class="user_number_text">Количество порций</p>
                        {{-- <div class="minus">-</div> --}}
                        <div class="number">
                            <input type="number" class="form-control" id="servings" value="1" name="count" min="1" onchange="changePrice()">
                        </div>
                        {{-- <div class="plus">+</div> --}}
                    </div>
                    <div class="slid_price">
                        <span>Цена</span>
                        <span id="total_price">руб.</span>
                    </div>
                    <textarea name="comment" name="" id="" cols="30" rows="10" placeholder="Оставить комментарии" class="slid_textarea"></textarea>
                    <button class="save_btn save_btn_02">Добавить</button>
                </form>
                </div>
                <div class="slid_item slid_item_02">
                    @if (count($menus))
                        @foreach ($menus as $menu)
                        <?php $price+=($menu['count'] * $menu['price']) ; ?>
                        <div class="slid_item_box">
                            <div class="slid_item_text">
                                {{ $menu['name'] }}
                            </div>
                            <div class="slid_item_numbr">
                                {{ $menu['count'] }} - {{ $menu['price'] }} руб.
                            </div>
                            <div class="slid_item_img">
                                <form action="{{ route('userOrderMenuEdit',['order'=>$menu['order_id'],'order_menu'=>$menu['menu_order_id']]) }}">
                                    <button class="btn btn-sm">
                                        <img src="{{ asset('assets/images/pen01.png') }}">
                                    </button>
                                </form>
                                <form action="{{ route('userOrderMenuDestroy',['order'=>$menu['order_id'],'order_menu'=>$menu['menu_order_id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm">
                                        <img src="{{ asset('assets/images/deled.png') }}">
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    <div class="pay">
                        <p>Общее: {{ $price }} рублей</p>
                        <p>Плата за обслуживание Х%: {{ ($price * 10 / 100) }} рублей </p>
                    </div>
                    <p class="payment">К оплате {{ ($price + ($price * 10 / 100)) }} рублей</p>
                    <div class="slid_btn">
                        <button class="btn_002 btn_001">Сохранить</button>
                        <button class="btn_002" onclick="location.href = '{{ route('userOrderHistorySingle',request('order')->id ) }}'">Отменить</button>
                    </div>
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
</script>
@endsection
