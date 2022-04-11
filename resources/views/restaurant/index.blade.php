@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
    <link href="{{ asset('assets/css/restaurant.css') }}" rel="stylesheet">
@endsection
@section('content')
       <a type="button" class="btn btn-block btn-primary" href="{{route('createMainRestaurantPage',request()->route('id') ?? null)}}">
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
                            <img class="card-img-top img-thumbnail" src="{{asset('./public/storage/restaurant/xe8E1wk503KkgxvNLnH0QCPG1M9jHgcYIQyTOSGU.png')}}" alt="Card image cap" style="width: 100px">
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
   {{$data->links()}}

@endsection

