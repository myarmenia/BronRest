@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
    <link href="{{ asset('assets/css/restaurant.css') }}" rel="stylesheet">
@endsection
@section('content')
       <!-- <a type="button" class="btn btn-block btn-primary" href="{{route('createMainRestaurantPage',request()->route('id') ?? null)}}">
        Создать {{request()->route('id') ? '' : 'Главный'}}  ресторан
        {{-- Добавьте основные данные для --}}
       </a>
<br>
<div class="d-flex flex-wrap justify-content-between cont-restaurant">
@if(isset($data))

    @foreach($data as $key => $dat)

        <div class="card p-3">
            <div class="card-head d-flex w-100 my-2">
                <div class="text-bold"> {{++$i}} </div>
                <div class="text-center w-100">
                    <h4 class="card-title w-100 "> {{$dat['name'] ?? null}} </h4>
                </div>
            </div>
            <hr width="100%">

            <div class="h-100 d-flex flex-column justify-content-between">
                <div class="">
                    @if(!request()->route('id'))
                        @if (count($dat['images'])>0)
                            @foreach($dat['images'] as $img)
                            <div class="col">
                                <img class="card-img-top img-thumbnail" src="{{route('getFile',['path' => $img['path'] ?: null])}}" alt="Card image cap" style="width: 100px">
                            </div>
                        @endforeach
                        @else
                        <div class="col">
                            <img class="card-img-top img-thumbnail" src="{{ route('getFile',['path' => 'public/restaurant/xe8E1wk503KkgxvNLnH0QCPG1M9jHgcYIQyTOSGU.png']) }}" alt="Card image cap" style="width: 100px">
                        </div>
                        @endif
                    @endif

                </div>
                <div class="my-2">
                    <p class="card-text">
                        {{$dat['desc'] ?? null}}
                    </p>
                </div>
                <div class="">
                    @if(!request()->route('id'))
                        <a href="{{route('getRestaurant',$dat['id'])}}" class="btn btn-primary"> Показывать </a>
                    @endif
                    <a class="btn btn-secondary" href="{{route('editRestaurant',$dat['id'])}}">
                        Редактировать
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@else
<div class='w-100 text-center'>Нет информации</div>
@endif
</div>
   {{$data->links()}} -->

<!-- /////////////////////////////////////////////////// -->

   <div class="container">
    <a href="{{route('createMainRestaurantPage',request()->route('id') ?? null)}}">
        <div class="amount">
            <div class="circle">+</div>
            <span> {{request()->route('id') ? '' : 'Добавить филиал'}}</span>
            {{-- Добавьте основные данные для --}}
        </div>
        </a>
   @if(isset($data))
   @foreach($data as $key => $dat)
        <div class="section">
            <div class="name">
                <h2 class="name_title">{{$dat['name'] ?? null}}</h2>

            </div>
            <!-- <p class="responsible"><a href="#"> Ответственное лицо</a></p> -->
            <div class="name_item">
                <!-- <p><a href="#">Направление кухни</a></p> -->
                <!-- <p><a href="#">Тип заведения</a></p> -->
                <p><a href="#">{{$dat['desc'] ?? null}}</a></p>
                <div class="geolocation">
                    <img src="{{ asset('assets/images/Group.png') }}">
                    <p><a href="#">{{$dat['address'] ?? null}}</a></p>
                </div>
                <p><a href="#">{{$dat['phone_number'] ?? null}}</a></p>
                <!-- <div class="working_time">
                    <p class="time_title">Время работы</p>
                    <div class="time">
                        <div class="time_opn_off">
                            <img src="{{ asset('assets/images/clock.png') }}">
                            <span>10:20-23:00</span>
                        </div>
                        <span class="daily">Ежедневно</span>
                    </div>
                </div> -->
            </div>
            <div class="time_img">

                <div class="time_photo">
                @if(!request()->route('id'))
                    @if (count($dat['images'])>0)
                        @foreach($dat['images'] as $img)
                             <img src="{{route('getFile',['path' => $img['path'] ?: null])}}">
                         @endforeach
                    @else
                        <img src="{{ route('getFile',['path' => 'public/restaurant/xe8E1wk503KkgxvNLnH0QCPG1M9jHgcYIQyTOSGU.png']) }}" alt="">
                    @endif
                @endif
                </div>

            </div>
            <div class="">
                    @if(!request()->route('id'))
                        <a href="{{route('getRestaurant',$dat['id'])}}">
                            <img src="{{ asset('assets/images/Group_1134.png') }}" alt="pan"> Показывать
                        </a>
                    @endif
                   <br>

                    <a href="{{route('editRestaurant',$dat['id'])}}">
                        <img src="{{ asset('assets/images/Group_1134.png') }}" alt="pan">Редактировать
                        @if(request()->route('id'))
                           и добавить меню
                         @endif
                    </a>
            </div>
            <br>
            <!-- <a href="app.html">
                <div class="amount">
                    <div class="circle">+</div>
                    <span>Добавить филиал</span>
                </div>
            </a> -->
        </div>
        @endforeach
        @else
        <div class='w-100 text-center'>Нет информации</div>
        @endif
    </div>
    {{$data->links()}}
    <!-- <div class="profile">
        <a href="#">
            <a href="#" class="profile_title">Профиль</a>
        </a>
        <hr>
        <a href="#" class="profile_text">Регистрация ресторана</a>
        <a href="#" class="profile_text">Меню</a>
        <a href="#" class="profile_text">Внесение посадочных мест</a>
    </div> -->

    <script>

    </script>
@endsection

