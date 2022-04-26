@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>
                    Заказы пользователей
                </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-primary">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered mt-3">
        <tr>
            <th>
                Электронная почта пользователя
            </th>
            <th>
                Время подхода
            </th>
            <th>
                Число людей
            </th>

            <th width="280px">Действие</th>
        </tr>
        @foreach ($orders as $key => $data)
            <tr>
                <td>{{ $data->user['email'] }}</td>
                <td>{{ $data->coming_date }}</td>
                <td>{{ $data->people_nums }}</td>
                <td>
                        <a href="{{ route('userShow',['id' => $data->id]) }}" class="btn btn-primary">
                            Редактировать
                        </a>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $feedbacks->links("pagination::bootstrap-5") !!} --}}

@endsection
