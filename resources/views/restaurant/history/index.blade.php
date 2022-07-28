@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="{{ asset('css/order/history/index.css') }}">
@endsection

@section('content')
   <div class="big-box">
        <div class="container">
            <div class="intelligence">
                    <div class="intelligence_box" style="width: 100%">
                        <div class="intelligence_header">
                            <h1>Сведения</h1>
                            {{-- <a href="#">+ Добавить в ручную</a> --}}
                        </div>
                        <div class="booking_date">
                            <div class="booking_hed">
                                <div class="input_items">
                                    <select class="select" name="restaurant"  onchange="changeDate(this.value,'rest')">
                                        <option selected disabled>
                                            Виберите Ресторан
                                        </option>
                                        @foreach ($rests as $rest)
                                        <option value="{{ $rest['id'] }}" @if(request('rest') == $rest['id']) selected @endif>
                                            {{ $rest['name'] }}
                                        </option>
                                        @endforeach
                                    </select>

                                    <!-- <input type="text" class="select" placeholder="Номер стола: 9"> -->
                                    <!-- <div class="select time">
                                        <img src="images002/time.png" alt="">
                                        <input type="time" class="select select_02">
                                    </div> -->
                                    <!-- <input type="text" class="select" placeholder="Имя"> -->
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <br>
                                    <div class="date">
                                        {{-- <img src="{{ asset('assets/images/date.png') }}"> --}}
                                        <input type="date" value="{{ request('date_from') }}" onchange="changeDate(this.value,'date_from')">
                                    </div>
                                    <br>
                                    <div class="date">
                                        {{-- <img src="{{ asset('assets/images/date.png') }}"> --}}
                                        <input type="date" value="{{ request('date_to') }}" onchange="changeDate(this.value,'date_to')">
                                    </div>

                                </div>

                            </div>

                        </div>
                        {{-- <div class="booking_hours">
                            <h1>Часы бронирования</h1>
                            <div class="booking_time">
                                @foreach ($data as $dat)
                                <input type="time" value="{{ Carbon\Carbon::parse($dat['coming_date'])->format('H:i') }}">
                                @endforeach
                            </div>
                        </div> --}}
                        <div class="free_tables">
                            <h1>Забронировано</h1>
                            @if(count($data))
                            @foreach ($data as $dat)
                            <div class="booked">
                                <div class="booked_numbr">
                                    <p>№{{ $dat['id'] }}</p>
                                </div>
                                <div class="booked_time">
                                    <p>{{ Carbon\Carbon::parse($dat['coming_date'])->format('H:i') }}</p>
                                </div>
                                <div class="booked_user">
                                    <img src="{{ asset('assets/images/users.png') }}">
                                    <p>{{ $dat['people_nums'] }}</p>
                                </div>
                                <div class="booked_name">
                                    <p>{{ $dat['user']->name }}</p>
                                </div>
                                <div class="booked_phone">
                                    <a>{{ $dat['user']->phone_number }}</a>
                                </div>
                                <div class="booked_menu">
                                    <p>{{ count($dat['menus']) ? '+' : '-'}} Меню</p>
                               </div>
                                <div class="booked_opl">
                                    <p> {{ $dat['status'] ? 'Опл.' : 'Не опл.'}}</p>
                                </div>
                                <div class="booked_img">
                                    <a href="{{ route('userOrderHistorySingle',$dat['id'] ) }}">
                                        <img src="{{ asset('assets/images/pen.png') }}">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
<script>
    function changeDate(paramValue,paramName){
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, '');
        if (url.indexOf(paramName + "=") >= 0) {
            var prefix = url.substring(0, url.indexOf(paramName + "="));
            var suffix = url.substring(url.indexOf(paramName + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
            url = prefix + paramName + "=" + paramValue + suffix;
        } else {
            if (url.indexOf("?") < 0)
                url += "?" + paramName + "=" + paramValue ;
            else
                url += "&" + paramName + "=" + paramValue ;
        }
        window.location.href = url + hash;
    }
    </script>
@endsection
