@extends('adminlte::page')

@section('title', 'Create Restauranat Floor Plane')

@section('content')
<div class="container">
    <form action="{{ route('updateFloorPlanData',request()->id) }}" method="POST" id="updateTab">
        @method('post')
        @csrf
    <div class="big__box">
     <div class="min__box">

         <div class="input__t">
             <label class="label">Название зала</label>
         <input type="text" placeholder="Написать" name="hall_name" required value="{{ $data->hall_name }}" form="updateTab">
         </div>

         {{-- <div class="input__t">
             <label class="label">Количество столов</label>
         <div class="fa_input">
             <input type="number" class="input002" id="table_count" min="1" required value="{{ count($data->tables) ?? 0 }}">
             <i class="fa fa-check" onclick="addTable()"></i>
         </div>
         </div> --}}

         <div class="table001" id="tables_div">
            @foreach ($data->tables as $num => $table)
            <div>
                <label class="label">Столик {{ $table->number }}</label>
                <div class="table_description">
                    <input type="text" hidden name="table[{{ $num }}][id]" value="{{ $table->id }}" form="updateTab">
                    <input type="text" hidden name="table[{{ $num }}][number]" value="{{ $table->number }}" form="updateTab">
                    <input type="text" placeholder="Описание расположения" class="input_text" name="table[{{ $num }}][location]" required value="{{ $table->location }}" form="updateTab">
                    <input type="number" placeholder="Кол.во стулов" class="input_number" name="table[{{ $num }}][count]" required min="1" value="{{ $table->count }}" form="updateTab">
                    <div>
                        <button type="button" class="btn text-light" form="destroTab" onclick="busy_free(this,'{{ $table->id }}')">
                           {{ $table->free ? 'освободит' : 'занимать' }} столик
                        </button>
                        {{-- <form action="{{ route('floorPlanTableDestroy',$table->id) }}" method="POST" style="display:flex" id="destroTab">
                           @method('delete')
                           @csrf
                            <button class="btn" form="destroTab">
                                <i class="fa fa-trash fa-sm" style="font-size: 20px"></i>
                            </button>
                        </form> --}}
                    </div>

                </div>
            </div>
            @endforeach
         </div>
         <button class="button001" type="button" onclick="addOneTable()" >
            Добавить стол
         </button>

     </div>
     {{-- <div class="add">
         <div class="plus">+</div>
         <div class="hall">Добавить зал</div>
     </div> --}}

     <div class="btn">
         <button class="button001 button002" form="updateTab">Сохранить</button>
         {{-- <a href="{{ route('floorPlan',request()->id) }}"><button type="button" class="button001 ">Отменить</button></a> --}}
     </div>
    </div>
</form>
 </div>


@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/floor-plan/style.css') }}">
@endsection

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/floor-plan/index.js') }}"></script>
<script src="{{ asset('js/floor-plan/edit.js') }}"></script>
@endsection
