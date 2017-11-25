@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Product List
                            <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Product</a>

                        </h4>
                    </div>
                    <div class="panel-body">
                        <table id="product-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Maks. Pinjam</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('jenis_recorder.form')
@endsection

@section('scripts')
    <script type="text/javascript">
        var table, save_method;
        table = $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('api.jenis_recorder.data') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama_recorder', name: 'nama_recorder'},
                {data:'harga_recorder', name: 'harga_recoorder'},
                {data:'batas_hari', name: 'batas_hari'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });

        $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ $base_url }}";
                    else url = "{{ $base_url . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        data : $('#modal-form form').serialize(),
                        success : function($data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: 'Data has been created!',
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(){
                            swal({
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });

        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add Category');
            $('.content').show();
            $('.content2').hide();
        }
        function showForm(id){
            $('input[name=_method]').text('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url : "{{ $base_url . '/' }}" + id + "/edit",
                type : "GET",
                dataType : "JSON",
                success : function(data){
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Detail Jenis Recorder');

                    $('.nama_recorder').text(data.nama_recorder);
                    $('.deskripsi').text(data.deskripsi);
                    $('.harga_recorder').text(data.harga_recorder);
                    $('.batas_hari').text(data.batas_hari);
                    $('.content').hide();
                    $('.content2').show();

                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }



        function editForm(id){
            save_method = "edit";
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url : "{{ $base_url . '/' }}" + id + "/edit",
                type : "GET",
                dataType : "JSON",
                success : function(data){
                    $('.content').show();
                    $('.content2').hide()
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Edit Jenis Recorder');

                    $('#id').val(data.id);
                    $('#nama_recorder').val(data.nama_recorder);
                    $('#deskripsi').val(data.deskripsi);
                    $('#harga_recorder').val(data.harga_recorder);
                    $('#batas_hari').val(data.batas_hari);
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

        function deleteData(id){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    url : "{{ $base_url . '/' }}" + id,
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : $('meta[name="csrf-token"]').attr('content')},
                    success : function(data) {
                        table.ajax.reload();
                        swal({
                            title: 'Success!',
                            text: 'Data has been created!',
                            type: 'success',
                            timer: '1500'
                        })
                    },
                    error : function () {
                        swal({
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            type: 'error',
                            timer: '1500'
                        })
                    }
                });
            });
        }

    </script>
@endsection