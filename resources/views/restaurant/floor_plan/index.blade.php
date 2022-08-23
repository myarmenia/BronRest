@extends('adminlte::page')

@section('title', 'Create Floor Plane')
@section('css')

    <link href="{{ asset('assets/css/edit/edit.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="container">

            <br>
            <div class="button">
                <a
                    type="button"
                    class="btn"
                    href="{{route('addFloorPlan',request()->route('id') ?? null)}}">
                    <button class="btn1" >Создать зал</button>
                </a>
            </div>
            <br>
            @if(isset($data))
                @foreach($data as $dat)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="time_text">
                                {{$dat['hall_name'] ?? null}}
                            </h5>
                            <h5 class="time_text">
                                {{$dat->tables_sum_count ?? null}} стульев
                            </h5>
                            <p class="time_text">
                                {{$dat['description'] ?? null}}
                            </p>
                            <a
                                href="{{route('editFloorPlan',$dat['id'])}}">
                                <button class="btn1" >Редактировать</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

    <br>
</div>
@endsection
