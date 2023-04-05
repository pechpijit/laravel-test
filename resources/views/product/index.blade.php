@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">รายการอุปกรณ์</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalInsert">เพิ่มอุปกรณ์ <span class="btn-icon-right"><i class="fa fa-plus"></i></span></button>
                        <div class="modal fade" id="myModalInsert">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">เพิ่มอุปกรณ์</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formInsert" autocomplete="off">
                                            @csrf
                                            <div class="form-group">
                                                <label for="ProductName" class="col-form-label">ชื่ออุปกรณ์:</label>
                                                <input type="text" class="form-control" id="ProductName" name="ProductName">
                                            </div>
                                            <div class="form-group">
                                                <label for="ProductPrice" class="col-form-label">ราคาอุปกรณ์:</label>
                                                <input type="number" class="form-control" id="ProductPrice" name="ProductPrice">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id" class="col-form-label">หมวดหมู่อุปกรณ์:</label>
                                                <select id="category_id" class="selectpicker" data-live-search="true" title="เลือกหมวดหมู่อุปกรณ์" name="category_id">
                                                    @foreach($category as $key => $val)
                                                        <option value="{{$val->id}}">{{$val->CategoryName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="status" class="col-form-label">สถานะ: </label>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" value="0" id="status" name="status">ปิดใช้งาน</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" onclick="ccin()">ยกเลิก</button>
                                        <button type="button" class="btn btn-primary" onclick="checkInput()">เพิ่ม</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="myModalUpdate">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">แก้ไขรายการอุปกรณ์</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formUpdate" autocomplete="off">
                                            @csrf
                                            <input type="hidden" id="IdEdit" name="id">
                                            <input type="hidden" id="_method" name="_method" value="PUT">
                                            <div class="form-group">
                                                <label for="ProductNameEdit" class="col-form-label">ชื่ออุปกรณ์:</label>
                                                <input type="text" class="form-control" id="ProductNameEdit" name="ProductName">
                                            </div>
                                            <div class="form-group">
                                                <label for="ProductPriceEdit" class="col-form-label">ราคาอุปกรณ์:</label>
                                                <input type="number" class="form-control" id="ProductPriceEdit" name="ProductPrice">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_idEdit" class="col-form-label">หมวดหมู่อุปกรณ์:</label>
                                                <select id="category_idEdit" class="selectpicker select-eit" data-live-search="true" title="เลือกหมวดหมู่อุปกรณ์" name="category_id">
                                                    @foreach($category as $key => $val)
                                                        <option value="{{$val->id}}">{{$val->CategoryName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="statusEdit" class="col-form-label">สถานะ: </label>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" value="0" id="statusEdit" name="status">ปิดใช้งาน</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal" onclick="ccin()">ยกเลิก</button>
                                        <button type="button" class="btn btn-primary" onclick="checkInputUpdate()">บันทึก</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="data-server-side">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>ชื่อ</th>
                                    <th width="100">ราคา</th>
                                    <th width="100">หมวดหมู่</th>
                                    <th width="100">สถานะ</th>
                                    <th>#</th>
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
    </div>
@endsection
@section('script')
    <script>
        var strBtnAction =
            "<button class='btn mb-1 btn-warning text-white edit-control' style='margin-right: 20px;'>" +
            "<i class='fa fa-edit'></i>" +
            "</button>" +
            "<button class='btn mb-1 btn-danger delete-control'>" +
            "<i class='fa fa-trash'></i>" +
            "</button>";

        $(document).ready(function () {
            swal('กรุณารอสักครู่...');
            swal.showLoading();
            loadDatable();
        });

        function loadDatable() {
            var dt = $('#data-server-side').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax:{
                    url:  '{{ url('admin/products/all') }}',
                    type: "GET",
                    dataFilter: function(reps) {
                        swal.close();
                        return reps;
                    },
                    error:function(err){
                        swal({
                            title: "อุ๊ปส์ เกิดข้อผิดพลาด",
                            text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง.",
                            timer: 2000,
                            type: "error",
                            showConfirmButton: false
                        });
                        console.log(err);
                    }

                },
                columns: [
                    {
                        data: 'id',
                        orderable: true,
                        searchable: false,
                        visible: false
                    },
                    {data: 'ProductName'},
                    {data: 'ProductPrice'},
                    {
                        "data": 'category_table',
                        render: function (data) {
                            return data['CategoryName']
                        },
                    },
                    {
                        "data": 'ProductStatus',
                        render: function (data) {
                            return checkStatus(data)
                        },
                    },
                    {
                        "class": "",
                        "orderable": false,
                        "data": null,
                        "defaultContent": strBtnAction
                    }
                ],
            });

            $('#data-server-side tbody').on('click', 'tr td button.edit-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row(tr);
                var data = row.data();
                setValueFormEdit(data);
            });

            $('#data-server-side tbody').on('click', 'tr td button.delete-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row(tr);
                var data = row.data();
                onDelete(data['id'])
            });
        }

        function checkStatus(data) {
            if (data === 1) {
                return '<span class="label label-pill label-success">เปิดใช้งาน</span>';
            } else {
                return '<span class="label label-pill label-danger">ระงับใช้งาน</span>';
            }
        }

        function setValueFormEdit(data) {
            document.getElementById('IdEdit').value = data['id'];
            document.getElementById('ProductNameEdit').value = data['ProductName'];
            document.getElementById('ProductPriceEdit').value = data['ProductPrice'];
            document.getElementById('statusEdit').checked = data['ProductStatus'] === 0;

            $('.select-eit').selectpicker('val', [data['category_id']]);
            $("#myModalUpdate").modal()
        }

        function ccin() {
            document.getElementById('ProductName').value = "";
            document.getElementById('ProductPrice').value = "";
            document.getElementById('status').checked = false;
        }

        function checkInput() {
            let name = document.getElementById('ProductName').value;
            let price = document.getElementById('ProductPrice').value;
            if (name && price) {
                $('#myModalInsert').modal('toggle');
                onSave();
            }else {
                $('#myModalInsert').modal('toggle');
                swal({
                    title: "กรุณากรอกข้อมูลให้ครบถ้วน",
                    text: "",
                    // timer: 2000,
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: 'ตกลง'
                }).then(function () {
                    $("#myModalInsert").modal('show')
                });
            }

        }

        function onSave() {
            let name = document.getElementById('ProductName').value;
            let price = document.getElementById('ProductPrice').value;
            let status = document.getElementById('status').checked;
            swal.queue([{
                title: 'เพิ่มข้อมูลหรือไม่ ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                text:
                    'กดปุ่ม "ตกลง" เพื่อยืนยันการบันทึกข้อมูล',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        var form = $('#formInsert')[0];
                        var data = new FormData(form);
                        $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            enctype: 'multipart/form-data',
                            url: '{{url('admin/products')}}',
                            data: data,
                            processData: false,
                            contentType: false,
                            timeout: 10000,
                            cache: false,
                            success: function (data) {
                                console.log(data);
                                if (data.status === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('admin/products')}}";
                                    }, 500);
                                    swal({
                                        title: "ทำรายการสำเร็จแล้ว",
                                        timer: 2000,
                                        type: "success",
                                        showConfirmButton: false
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด",
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง.",
                                    // timer: 2000,
                                    type: "error",
                                    howConfirmButton: true,
                                    confirmButtonText: 'ตกลง'
                                });
                            }
                        });
                    })
                }
            }]).then(function() {
                document.getElementById('ProductName').value = name;
                document.getElementById('ProductPrice').value = price;
                document.getElementById('status').checked = status;
                $("#myModalInsert").modal('show')
            });
        }

        function checkInputUpdate() {
            let name = document.getElementById('ProductNameEdit').value;
            let price = document.getElementById('ProductPriceEdit').value;
            let id = document.getElementById('IdEdit').value;

            if (name && price) {
                $('#myModalUpdate').modal('toggle');
                onUpdate(id);
            }else {
                $('#myModalUpdate').modal('toggle');
                swal({
                    title: "กรุณากรอกข้อมูลให้ครบถ้วน",
                    text: "",
                    // timer: 2000,
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: 'ตกลง'
                }).then(function () {
                    $("#myModalUpdate").modal()
                });
            }
        }

        function onUpdate(id) {
            let name = document.getElementById('ProductName').value;
            let price = document.getElementById('ProductPrice').value;
            let status = document.getElementById('status').checked;
            swal.queue([{
                title: 'อัพเดทข้อมูลหรือไม่ ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                text:
                    'กดปุ่ม "ตกลง" เพื่อยืนยันการอัพเดทข้อมูล',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        var form = $('#formUpdate')[0];
                        var data = new FormData(form);
                        $.ajax({
                            type: 'POST',
                            enctype: 'multipart/form-data',
                            url: '{{url('admin/products')}}/'+id,
                            data: data,
                            processData: false,
                            contentType: false,
                            timeout: 30000,
                            cache: false,
                            success: function (data) {
                                if (data.status === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('admin/products')}}";
                                    }, 500);
                                    swal({
                                        title: "อัพเดทข้อมูลสำเร็จแล้ว",
                                        timer: 5000,
                                        type: "success",
                                        showConfirmButton: false
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด",
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง.",
                                    timer: 2000,
                                    type: "error",
                                    showConfirmButton: true,
                                    confirmButtonText: 'ตกลง',
                                });
                            }
                        });
                    })
                }
            }]).then(function() {
                document.getElementById('ProductName').value = name;
                document.getElementById('ProductPrice').value = price;
                document.getElementById('status').checked = status;
                $('#myModalUpdate').modal()
            });
        }

        function onDelete(id) {
            swal.queue([{
                title: 'ยืนยันการลบ ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                text: 'กดปุ่ม "ตกลง" เพื่อยืนยันการทำรายการ',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        console.log(id);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: "POST",
                            url: '{{url('admin/products')}}/'+id,
                            data: {
                                "_method": 'DELETE'
                            },
                            timeout: 3000,
                            cache: false,
                            success: function (data) {
                                console.log(data);
                                if (data === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('admin/products')}}";
                                    }, 500);
                                    swal({
                                        title: "ทำรายการสำเร็จแล้ว",
                                        timer: 2000,
                                        type: "success",
                                        showConfirmButton: false
                                    });
                                }else if (data === 'NoDelete'){
                                    swal({
                                        title: "อุ๊ปส์ เกิดข้อผิดพลาด",
                                        text: "ไม่สามารถลบหมวดหมู่นี้ได้ เนื่องจากกำลังถูกใช้งาน.",
                                        // timer: 2000,
                                        type: "error",
                                        howConfirmButton: true,
                                        confirmButtonText: 'ตกลง'
                                    });
                                }
                            },
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด",
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง.",
                                    // timer: 2000,
                                    type: "error",
                                    howConfirmButton: true,
                                    confirmButtonText: 'ตกลง'
                                });
                            }
                        });
                    })
                }
            }]);
        }
    </script>
@endsection
