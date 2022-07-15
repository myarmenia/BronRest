@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
    <link href="{{ asset('assets/css/uploade-file.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/rest/style.css') }}">

@endsection
@section('content')
    <div class="card">
        <div class="card-body login-card-body k_login_card_body">
            <p class="login-box-msg">
                Создать  {{request()->route('id') ? '' : 'Главный'}} ресторан
            </p>
            <form action="{{route('createRestaurant',request()->route('id'))}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label >Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror k_form_control" placeholder="Имя" name="name" value="{{ old('name') }}">

                    {{-- <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div> --}}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label >Номер телефона</label>
                    <input type="number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }} k_form_control" placeholder="Номер телефона" name="phone_number" value="{{ old('phone_number') }}">
                    {{-- <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div> --}}
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }} k_form_control k_text_area" rows="3" placeholder="Описание ..." name="desc">
                            {{ old('desc') ? old('desc') : '' }}
                        </textarea>
                        @if ($errors->has('desc'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('desc') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                @if(!request()->route('id'))
                    <div class="form-group">
                        <label for="exampleInputFile">Выберите логотип ресторана</label>
                            <div class="input-group k_input_group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                    <label class="custom-file-label k_custom_file_label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                    </div>
                @endif


                @if(request()->route('id'))
                <div class="row form-group">
                    <input type="text" name="latit" class="latit_inp"  hidden required>
                    <input type="text" name="address" class="address_inp"  hidden>
                    <input type="text" name="longit" class="longit_inp"  hidden required>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-check-label">Категории кухонь</label>
                            @foreach($kitchenCategories as $data)
                                <div class="form-check">
                                    <input class="form-check-input checkbox_fuc" type="checkbox" name="kitchen_cats[{{ $data['id'] }}]">
                                    <label class="form-check-label">{{ $data['name'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                @foreach($days as $day)
                <div class="col-3">
                <label>{{$day->day}}</label>
                <input type="time" class="form-control work-days-start" name="{{$day->id . '_start'}}">
                <input type="time" class="form-control work-days-end" name="{{$day->id . '_end'}}">
                </div>
                @endforeach
                <br>
                <br>

                </div>
                <div class="form-group">

                    <div class="form-group card-body">
                        <label for="exampleInputFile">Выберите изображения</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input uploade-file" id="exampleInputFile" name="images[]" multiple>
                                    <label class="custom-file-label k_custom_file_label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                    </div>

                    <div class="col">
                        <div id="map" style="width: 100%; height: 400px"></div>
                    </div>
                @endif

                <div class="cont-uploaded-images"></div>
                <!-- <div id="classRight" class="classRight">
                    <div class="row">
                        <div class="col-12 k_btn_lime">
                            <button type="submit" class="btn btn-primary btn-block k_lime">Создать</button>
                        </div>
                    </div>
                </div> -->
                <div class="test">
                    <div class="test2">
                        <div class="col-12 test3">
                            <button type="submit" class="btn btn-primary btn-block k_lime">Создать</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('css')
@stop

@section('js')
<script src="https://api-maps.yandex.ru/2.1/?apikey=a750744b-d04d-479b-9650-d81ed44bfffc&lang=ru_RU" type="text/javascript">
</script>
<script src="{{ asset('assets/js/uploade_file.js') }}"></script>
<script src="{{ asset('assets/js/work_days.js') }}"></script>

@if(request()->route('id'))
        <script src="{{mix ('js/app.js')}}"></script>


    <script type="text/javascript">

    $('.checkbox_fuc').on('change', function (e) {
    if ($('.checkbox_fuc:checked').length > 3) {
        $(this).prop('checked', false);
        alert("allowed only 3");
    }
});
    </script>
    <script type="text/javascript" src="{{asset('js/yandex_map.js')}}">
    </script>
    <script>
        start()
        document.getElementById('classRight').style.display = 'flex';
        document.getElementById("classRight").style.justifyContent = "center";


    </script>
@endif
@endsection
