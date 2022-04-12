@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
    <link href="{{ asset('assets/css/uploade-file.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')


    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Создать  {{request()->route('id') ? '' : 'Главный'}} ресторан
            </p>
            <form action="{{route('createRestaurant',request()->route('id'))}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label >Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Имя" name="name" value="{{ old('name') }}">

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
                    <input type="number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" placeholder="Номер телефона" name="phone_number" value="{{ old('phone_number') }}">
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
                        <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" rows="3" placeholder="Описание ..." name="desc">
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
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                    </div>
                @endif


                @if(request()->route('id'))
                <div class="row form-group">
                    <input type="text" name="latit" class="latit_inp"  hidden>
                    <input type="text" name="longit" class="longit_inp"  hidden>
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
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                    </div>

                    <div class="col">
                        <div id="map" class="map"></div>
                    </div>
                @endif

                <div class="cont-uploaded-images"></div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('css')
    <style>
        .map {
        height: 400px;
        width: 100%;
      }
    </style>
@stop

@section('js')
<script src="{{ asset('assets/js/uploade_file.js') }}"></script>
<script src="{{ asset('assets/js/work_days.js') }}"></script>

@if(request()->route('id'))
        <script src="{{mix ('js/app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.13.0/build/ol.js"></script>
        <script src="https://unpkg.com/ol-geocoder"></script>


    <script type="text/javascript">
         var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([37.41, 8.82]),
          zoom: 4
        })
      });

      1


    map.on('click', function(evt) {
        let coords = ol.proj.toLonLat(evt.coordinate);
        let lat = coords[1];
        let lon = coords[0];
        $('.latit_inp').val(lat)
        $('.longit_inp').val(lon)
        console.log(lon);

    });



    $('.checkbox_fuc').on('change', function (e) {
    if ($('.checkbox_fuc:checked').length > 3) {
        $(this).prop('checked', false);
        alert("allowed only 3");
    }
});
    </script>
@endif
@endsection
