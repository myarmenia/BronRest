@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2> Обратная связь</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('seeFeedbacks') }}"> Назад </a>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Тема:</strong>
                {{ $feedback->theme }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Сообщение:</strong>
                {{ $feedback->message }}
            </div>
        </div>
        {!! Form::open(['method' => 'DELETE','route' => ['destroyFeedback', $feedback->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection
