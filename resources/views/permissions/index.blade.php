@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-3">
                <h2>Управление разрешениями</h2>
            </div>
            <div class="pull-right">
                @can('perm-create')
                    <button class="btn btn-success" data-toggle="modal" data-target="#createPerm"> Создать новое разрешение </button>
                @endcan
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
            <th>#</th>
            <th>Имя</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($perms as $key => $perm)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $perm->name }}</td>
                <td>
                    @can('perm-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $perm->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {!! $perms->links("pagination::bootstrap-5") !!}




    <div class="modal" id="createPerm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить разрешение</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('permissions.store')}}" method="POST">
                        <div class="form-group">
                            @csrf
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Сохранить</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
