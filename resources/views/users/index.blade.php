@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Управление пользователями</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Эл. адрес</th>
            <th>Роли</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    @can('user-show')
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"> Показать</a>
                    @endcan
                    @can('user-edit')
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
                    @endcan

                    @can('user-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                    @endcan

                </td>
            </tr>
        @endforeach
    </table>


    {!! $data->render() !!}

@endsection
