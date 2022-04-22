@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>
                    Обратная связь
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
                Тема
            </th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($feedbacks as $key => $data)
            <tr>
                <td>{{ $data->user['email'] }}</td>
                <td>{{ $data->theme }}</td>
                <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['destroyFeedback', $data->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('showFeedback',['id' => $data->id]) }}" class="btn btn-primary">
                            Редактировать
                        </a>
                </td>
            </tr>
        @endforeach
    </table>

    {{-- {!! $feedbacks->links("pagination::bootstrap-5") !!} --}}

@endsection
