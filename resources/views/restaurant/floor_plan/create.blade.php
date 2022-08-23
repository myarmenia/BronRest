@extends('adminlte::page')

@section('title', 'Create Restauranat Floor Plane')

@section('content')
<div class="container">
    <form action="{{ route('createFloorPlanData',request()->id) }}" method="POST">
        @csrf
    <div class="big__box">
     <div class="min__box">
         <div class="input__t">
             <label class="label">Название зала</label>
         <input type="text" placeholder="Написать" name="hall_name" required>
         </div>

         <div class="input__t">
             <label class="label">Количество столов</label>
         <div class="fa_input">
             <input type="number" class="input002" id="table_count" min="1" required>
             <i class="fa fa-check" onclick="addTable()"></i>
         </div>
         </div>

         <div class="table001" id="tables_div">

         </div>
         <button class="button001" type="button" onclick="addOneTable()">
            Добавить стол
         </button>



     </div>
     {{-- <div class="add">
         <div class="plus">+</div>
         <div class="hall">Добавить зал</div>
     </div> --}}

     <div class="btn">
         <button class="button001 button002">Сохранить</button>
         <a href="{{ route('floorPlan',request()->id) }}"><button type="button" class="button001 ">Отменить</button></a>
     </div>
    </div>
</form>
 </div>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/floor-plan/style.css') }}">
@endsection

@section('js')

<script src="{{ asset('js/floor-plan/index.js') }}"></script>
@endsection
