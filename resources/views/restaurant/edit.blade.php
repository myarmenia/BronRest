@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
    <link href="{{ asset('assets/css/uploade-file.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/restaurant.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/restaurant1.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')






<div class="container">
   
    <div class="card ">
        @if($data->parent)
            <div class="row pp">
               
               
                    <div class="button">
                    <a href="{{route('restMenu',request()->route('id'))}}">
                        <button class="btn1" >Добавить меню</button> 
                    </a>
                    
                </div>
                <div class="button">
                    <a href="{{route('floorPlan',request()->route('id'))}}">
                    <button class="btn1" >Создать зал</button> 
                    </a>
                </div>
            </div>
        @endif
        <div class="">
            <div class="">

                    {{ session('status') ? 'Данни ресторана успешно изменено' :
                   (session('store') ? 'Ресторан успешно создан' : '')}}
            </div>
            </div>
    </div>
    <div class="hh">
    <form action="{{route('editRestaurantData',request()->route('id'))}}" method="post" enctype="multipart/form-data" name="some2">
        @csrf
        @method('put')
        @if(isset($data->parent->mainImage))
                <div class="time_img">
                    <p class="time_text">Логотип ресторана</p>
                    <div class="time_photo">
                    <img src="{{route('getFile',['path' => $data->parent->mainImage['path'] ?: null])}}" alt="Photo" >
                    </div>

                </div>
        @endif
        @if(isset($data->parent))
            <div class="content_box">
                <p class="time_text">Главная названия ресторана</p>
                <input type="text" value="{{$data->parent['name'] ?? null}}" disabled>
            </div>
        @endif
        <br>
        <div class="content_box">
            <p class="time_text">Название заведения</p>
            <input type="text" class="@error('name') is-invalid @enderror"  placeholder="Название заведения" value="{{$data['name'] ?? null}}" name="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="content_box">
        <p class="time_text">Номер телефона</p>
            <input type="number" class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}"  placeholder="Номер телефона" value="{{$data['phone_number'] ?? null}}" name="phone_number">
            @if ($errors->has('phone_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
            @endif
        </div>
        <div class="content_box">
            <p class="time_text">Описание заведения</p>
            <textarea class="textarea {{ $errors->has('desc') ? 'is-invalid' : '' }}" rows="3" placeholder="Описание заведения" name="desc">
                 {{$data['desc'] ?? null}}
            </textarea>
            @if ($errors->has('desc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('desc') }}</strong>
                </span>
            @endif       
        </div>
        @if(isset($data->parent))
            <div class="row">
                @foreach($days as $num => $day)
                <div class="time_work">
                    <div class="time">
                    
                        <p class="time_text">{{$day->day}}</p>
                        <input type="time" class=" work-days-start" name="{{$day->id . '_start'}}"
                        value="{{$data->days[$num]['start'] ?? null}}">
                        <br>
                        <input type="time" class=" work-days-end" name="{{$day->id . '_end'}}"
                        value="{{$data->days[$num]['end'] ?? null}}">
                    
                    </div>
                </div>
                <pre></pre>
                @endforeach
            </div>
        @endif
        <br>
        @if(isset($data->images))
            <div class="row mt-3">
                @foreach($data->images as $num => $dat)
                <div class="time_img image_container">
                    <div class="time_photo">
                        <img class="images" src="{{route('getFile',['path' => $dat['path'] ?: null])}}" alt="Photo">
                            <div class="top-right">
                                <button class="btn" type="button" onclick="deleted('{{$num}}','{{$dat['path']}}')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                    </div>
                    <input class="delete_image{{$num}}" type="text" hidden name="delete_image[]">
                </div>
                @endforeach
            </div>
        @endif
        @if(!isset($data->parent))
            <div class="form-group">
                <p class="time_text" for="exampleInputFile">Выберите логотип ресторана</p>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile" name="logo">
                            <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                        </div>
                    </div>
            </div>

        @endif

                @if(isset($data->parent))
                    <input type="text" name="latit" class="latit_inp"  hidden>
                    <input type="text" name="address" class="address_inp"  hidden>
                    <input type="text" name="longit" class="longit_inp"  hidden>
                    <div class="col-sm-6">
                        <div class="form-group">
                        <p class="time_text">Категории кухонь </p>
                                @foreach($kitchenCategories as $dat)
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_fuc" type="checkbox" name="kitchen_cats[{{ $dat['id'] }}]"
                                            @if ($data->kitchen_categories->contains($dat['id']))
                                                checked
                                            @endif>
                                            <p class="time_text">{{ $dat['name'] }}</p>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                    <div class="form-group ">
                    <p class="time_text">Выберите изображения</p>
                        <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                    <div class="amount">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="col">
                            <div id="map" style="width: 100%; height: 400px"></div>
                        </div>
                    </div>
                @endif
                <div class="cont-uploaded-images d-flex"></div>
                <div class="row">
                    <div class="button">
                        <button type="submit" class="btn btn1">Сохранить</button>
                    </div>
                </div>
    </form>
    </div>
</div>
<!-- -------------------------------------------------->
   
    
            <!-- <form action="{{route('editRestaurantData',request()->route('id'))}}" method="post" enctype="multipart/form-data" name="some2">
                @csrf
                @method('put')

                @if(isset($data->parent->mainImage))
                    <div class="row">
                            <div class="col form-group">
                                <label for="">Логотип ресторана</label>
                                <br>
                                <img class="img-responsive" src="{{route('getFile',['path' => $data->parent->mainImage['path'] ?: null])}}" alt="Photo" width="100px">
                            </div>
                    </div>
                @endif

                @if(isset($data->parent))
                    <div class="form-group">
                            <label >Главная названия ресторана</label>
                            <input type="text" class="form-control"  value="{{$data->parent['name'] ?? null}}" disabled>
                    </div>
                @endif

                <div class="form-group">
                    <label >Имя</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="Имя" value="{{$data['name'] ?? null}}" name="name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label >Номер телефона</label>
                    <input type="number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"  placeholder="Номер телефона" value="{{$data['phone_number'] ?? null}}" name="phone_number">
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <textarea class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" rows="3" placeholder="Описание" name="desc">
                         {{$data['desc'] ?? null}}
                    </textarea>
                    @if ($errors->has('desc'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('desc') }}</strong>
                            </span>
                    @endif
                </div>

                @if(isset($data->parent))
                    <div class="row">
                        @foreach($days as $num => $day)
                            <div class="col-3">
                                <label>{{$day->day}}</label>
                                <input type="time" class="form-control work-days-start" name="{{$day->id . '_start'}}"
                                value="{{$data->days[$num]['start'] ?? null}}">
                                <input type="time" class="form-control work-days-end" name="{{$day->id . '_end'}}"
                                value="{{$data->days[$num]['end'] ?? null}}">
                            </div>
                        @endforeach
                    </div>
                @endif
               <br>
                @if(isset($data->images))
                    <div class="row mt-3">
                            @foreach($data->images as $num => $dat)
                                <div class="col-3 i-cont">
                                    <div class="image_container d-flex">

                                        <img class="img-responsive images" src="{{route('getFile',['path' => $dat['path'] ?: null])}}" alt="Photo" width="100%">
                                        <div class="top-right">
                                            <button class="btn" type="button" onclick="deleted('{{$num}}','{{$dat['path']}}')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <input class="delete_image{{$num}}" type="text" hidden name="delete_image[]">
                                </div>

                            @endforeach
                    </div>
                @endif

               <br>

                @if(!isset($data->parent))
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

                @if(isset($data->parent))
                    <input type="text" name="latit" class="latit_inp"  hidden>
                    <input type="text" name="address" class="address_inp"  hidden>
                    <input type="text" name="longit" class="longit_inp"  hidden>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-check-label"> Категории кухонь </label>
                                @foreach($kitchenCategories as $dat)
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_fuc" type="checkbox" name="kitchen_cats[{{ $dat['id'] }}]"
                                            @if ($data->kitchen_categories->contains($dat['id']))
                                                checked
                                            @endif>
                                        <label class="form-check-label">{{ $dat['name'] }}</label>
                                    </div>
                                @endforeach
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputFile">Выберите изображения</label>
                        <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                    <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Выберите файл</span>
                                </div>
                        </div>
                        <br>
                        <div class="col">
                            <div id="map" style="width: 100%; height: 400px"></div>
                        </div>
                    </div>
                @endif
                <div class="cont-uploaded-images d-flex"></div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                    </div>
                </div>
            </form> -->
        
@endsection


@section('css')
    <!-- <style>
      .image_container{
          position: relative;
          text-align: center;
          color: white;
          width: 200px;

          }
          .top-right {
          position: absolute;
          top: 8px;
          right: 16px;
          }
      }
    </style> -->
@stop

@section('js')
<script src="https://api-maps.yandex.ru/2.1/?apikey=a750744b-d04d-479b-9650-d81ed44bfffc&lang=ru_RU" type="text/javascript">
</script>
<script src="{{ asset('assets/js/uploade_file.js') }}"></script>
<script src="{{ asset('assets/js/work_days.js') }}"></script>
<script>
     function deleted(id, path){
          let inp = $('.delete_image' + id)
          inp.val(path)
          console.log($(this).parent().find('.image_container'))
          inp.parent().find('.image_container').remove()

     }


</script>
@if($data->parent)
        <script src="{{mix ('js/app.js')}}"></script>
    
        <script type="text/javascript" src="{{asset('js/yandex_map.js')}}">
        </script>  
        <script>
            start("{{$data['longit'] ?? null}}","{{$data['latit'] ?? null}}")    
        </script>  
    <script>
    $('.checkbox_fuc').on('change', function (e) {
     if ($('.checkbox_fuc:checked').length > 3) {
        $(this).prop('checked', false);
        alert("allowed only 3");
        }
    });
    </script>
@endif
@endsection
