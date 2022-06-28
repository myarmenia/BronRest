@extends('adminlte::page')

@section('title', 'Create Restauranat')
@section('css')
   
    <link href="{{ asset('assets/css/accordion.css') }}" rel="stylesheet">
   
@endsection
@section('content')

    <!-- <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-primary" onClick="add()" href="javascript:void(0)"> Создать </a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="ajax-crud-datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название еды</th>
                    <th>Цена</th>
                    <th>Категория</th>
                    <th>Created at</th>
                    <th>Действие</th>
                </tr>
                </thead>
            </table>
        </div>
    </div> -->
    
    <!-- boostrap company model -->
    <div class="modal fade" id="company-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="CompanyModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="CompanyForm" name="CompanyForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Название еды</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Название еды" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Цена</label>
                            <div class="col-sm-12">
                                <input pattern="^\d*(\.\d{0,2})?$" class="form-control" id="price" name="price" placeholder="Enter Price" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Описание</label>
                            <div class="">
                                <textarea name="desc" id="" class="w-100" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Категория</label>
                            @if($categories)
                                <input class="form-control" list="datalistOptions" id="exampleDataList" name="category">
                                <datalist id="datalistOptions">
                                    @foreach($categories as $cat)
                                        <option value="{{$cat['name']}}">
                                    @endforeach
                                </datalist>
                            @endif
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->
    <div class="container">
    <div class="accordion">
    <a class="btn btn1" onClick="add()" href="javascript:void(0)"> Создать </a><br><br>
   
            <div class="accordion_item ">
                <div class="accordion_title ">
                    <div class="accordion_titimg " >
                        <h1>Основные блюда</h1>
                        <a href="# "> <img src="{{ asset('assets/images/Group_1134.png') }}"></a>
                    </div>
                    <div class="deg">
                        <img src="{{ asset('assets/images/Vector-65.png') }}">
                    </div>
                </div>
                @foreach($data as $datas)
                @if($datas->category_id == 1)
                <div class="accordion_answer ">
                    <div class="price ">
                        <div class="price_box ">
                            <div class="price_img ">
                            <img src="{{ route('getFile',['path' => $datas->img]) }}" alt="">
                            </div>
                            <div class="price_text ">
                                <div class="price_dish ">
                                    <p>Название Блюда : {{$datas->name}}</p>
                                    <p>Цена : {{$datas->price}}</p>
                                </div>
                                <p class="price_dish_text ">{{$datas->desc}}</p>
                            </div>
                            <div class="price_icon ">
                                <i class="fa fa-ban "></i>
                                <!-- <img src="images/Group-1260.png "> -->
                                <img src="{{ asset('assets/images/Group_1134.png') }} ">
                                <img src="{{ asset('assets/images/Group-139.png ') }}" onclick="deleteFunc('{{$datas->id}}')">
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="accordion_item ">
                <div class="accordion_title ">
                    <div class="accordion_titimg " >
                        <h1>Десерты</h1>
                        <a href="# "> <img src="{{ asset('assets/images/Group_1134.png') }}"></a>
                    </div>

                    <div class="deg">
                    <img src="{{ asset('assets/images/Vector-65.png') }}">

                    </div>
                </div>
                @foreach($data as $datas)
                @if($datas->category_id == 2)
                <div class="accordion_answer ">
                    <div class="price ">
                        <div class="price_box ">
                            <div class="price_img ">
                            <img src="{{ route('getFile',['path' => $datas->img]) }}" alt="">
                            </div>
                            <div class="price_text ">
                                <div class="price_dish ">
                                    <p>Название Блюда : {{$datas->name}}</p>
                                    <p>Цена : {{$datas->price}}</p>
                                </div>
                                <p class="price_dish_text ">{{$datas->desc}}</p>
                            </div>
                            <div class="price_icon ">
                                <i class="fa fa-ban "></i>
                                <!-- <img src="images/Group-1260.png "> -->
                                <img src="{{ asset('assets/images/Group_1134.png') }} ">
                                <img src="{{ asset('assets/images/Group-139.png ') }}" onclick="deleteFunc('{{$datas->id}}')">
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="accordion_item ">
                <div class="accordion_title ">
                    <div class="accordion_titimg " >
                        <h1>Напитки</h1>
                        <a href="# "> <img src="{{ asset('assets/images/Group_1134.png') }}"></a>
                    </div>

                    <img src="{{ asset('assets/images/Vector-65.png') }}">
                </div>
                @foreach($data as $datas)
                @if($datas->category_id == 3)
                <div class="accordion_answer ">
                    <div class="price ">
                        <div class="price_box ">
                            <div class="price_img ">
                            <img src="{{ route('getFile',['path' => $datas->img]) }}" alt="">
                            </div>
                            <div class="price_text ">
                                <div class="price_dish ">
                                    <p>Название Блюда : {{$datas->name}}</p>
                                    <p>Цена : {{$datas->price}}</p>
                                </div>
                                <p class="price_dish_text ">{{$datas->desc}}</p>
                            </div>
                            <div class="price_icon ">
                                <i class="fa fa-ban "></i>
                                <!-- <img src="images/Group-1260.png "> -->
                                <img src="{{ asset('assets/images/Group_1134.png') }} ">
                                <img src="{{ asset('assets/images/Group-139.png ') }}" onclick="deleteFunc('{{$datas->id}}')">
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            
            <div class="accordion_item ">
                <div class="accordion_title ">
                    <div class="accordion_titimg ">
                        <h1>Алкогольные напитки</h1>
                        <a href="# "> <img src="{{ asset('assets/images/Group_1134.png ') }}"></a>
                    </div>

                    <img src="{{ asset('assets/images/Vector-65.png') }}">
                </div>
                @foreach($data as $datas)
                @if($datas->category_id == 4)
                <div class="accordion_answer ">
                    <div class="price ">
                        <div class="price_box ">
                            <div class="price_img ">
                                <img src="{{ asset('assets/images/fod.jpg') }} ">
                            </div>
                            <div class="price_text ">
                                <div class="price_dish ">
                                    <p>Название Блюда</p>
                                    <p>1000 руб.</p>
                                </div>
                                <p class="price_dish_text ">Ингридиенты: куриное филе, помидоры черри, сыр пармезан, хлеб, помидоры черри, сыр пармезан, хлеб, чеснок...</p>
                            </div>
                            <div class="price_icon ">
                                <i class="fa fa-ban "></i>
                                <!-- <img src="images/Group-1260.png "> -->
                                <img src="{{ asset('assets/images/Group_1134.png') }} ">
                                <img src="{{ asset('assets/images/Group-139.png ') }}" onclick="deleteFunc('{{$datas->id}}')">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets/js/accardion.js') }}"></script>
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                language: {
                    "sProcessing":   "Подождите...",
	"sLengthMenu":   "Показать _MENU_ записей",
	"sZeroRecords":  "Записи отсутствуют.",
	"sInfo":         "Записи с _START_ до _END_ из _TOTAL_ записей",
	"sInfoEmpty":    "Записи с 0 до 0 из 0 записей",
	"sInfoFiltered": "(отфильтровано из _MAX_ записей)",
	"sInfoPostFix":  "",
	"sSearch":       "Поиск:",
	"sUrl":          "",
	"oPaginate": {
		"sFirst": "Первая",
		"sPrevious": "Предыдущая",
		"sNext": "Следующая",
		"sLast": "Последняя"
	},
	"oAria": {
		"sSortAscending":  ": активировать для сортировки столбца по возрастанию",
		"sSortDescending": ": активировать для сортировки столбцов по убыванию"
	}
                 },
                ajax: "{{ route('restMenu',request()->route('id') ) }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'category.name', name: 'category_id' },
                    { data: 'img', render : function ( data, type, row, meta ) {
                            let img = `<img src="/get_file?path=${data}" width="50">`
                            return img
                        } },
                    {data: "id" , render : function ( data, type, row, meta ) {
                            let but = `<div>
                            <button class="btn" onclick="deleteFunc5('${data}')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            <a class="btn" href="{{url('restaurant/menu/edit')}}/${data}">
                            <i class="fas fa-edit"></i>
                            </a>
                            </div>`
                            return but
                        }},
                ],
                order: [[0, 'desc']]
            });
        });
        function add(){
            $('#CompanyForm').trigger("reset");
            $('#CompanyModal').html("Добавить блюда");
            $('#company-modal').modal('show');
            $('#id').val('');
        }
        function editFunc(id){
            $.ajax({
                type:"POST",
                url: "",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    $('#CompanyModal').html("Edit Company");
                    $('#company-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#address').val(res.address);
                    $('#email').val(res.email);
                }
            });
        }
        function deleteFunc(id){

                $.ajax({
                    type:"DELETE",
                    url: "{{ url('restaurant/menu/delete') }}/" + id ,
                    data: { id: id },
                    dataType: 'json',
                    success: function(res){
                        var oTable = $('#ajax-crud-datatable').dataTable();
                        oTable.fnDraw(false);
                    }
                });

        }
        $('#CompanyForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: "{{ route('restMenuCreate',request()->route('id'))}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#company-modal").modal('hide');
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save"). attr("disabled", false);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

    </script>
    <script>
     
        
    </script>
@endsection
