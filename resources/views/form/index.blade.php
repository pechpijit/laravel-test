@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ฟอร์มเบิกอุปกรณ์</h4>
                        <a href="{{url('form/create')}}" class="btn btn-primary">
                            เพิ่มฟอร์ม<span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                        <div class="table-responsive">
                            <table class="table zero-configuration" id="data-server-side">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>ชื่อ</th>
                                    <th>เวลา</th>
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
        let strBtnAction =
            "<button class='btn mb-1 btn-info text-white details-control' style='margin-right: 20px;'>" +
            "<i class='fa fa-eye'></i>" +
            "</button>" +
            // "<button class='btn mb-1 btn-warning text-white edit-control' style='margin-right: 20px;'>" +
            // "<i class='fa fa-edit'></i>" +
            // "</button>" +
            "<button class='btn mb-1 btn-danger delete-control'>" +
            "<i class='fa fa-trash'></i>" +
            "</button>";

        $(document).ready(function () {
            swal('กรุณารอสักครู่...');
            swal.showLoading();
            loadDatable();
        });

        function timeConverter(UNIX_timestamp){
            var a = new Date(UNIX_timestamp * 1000);
            var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            var year = a.getFullYear();
            var month = months[a.getMonth()];
            var date = a.getDate();
            var hour = a.getHours();
            var min = a.getMinutes();
            var sec = a.getSeconds();
            var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
            return time;
        }

        function loadDatable() {
            var dt = $('#data-server-side').DataTable({
                processing: true ,
                serverSide: true ,
                destroy: true ,
                ajax: {
                    url: '{{ url('form/all') }}' ,
                    type: "GET" ,
                    dataFilter: function (reps) {
                        swal.close();
                        return reps;
                    } ,
                    error: function (err) {
                        swal({
                            title: "อุ๊ปส์ เกิดข้อผิดพลาด" ,
                            text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง." ,
                            timer: 2000 ,
                            type: "error" ,
                            showConfirmButton: false
                        });
                        console.log(err);
                    }
                } ,
                columns: [
                    {
                        data: 'id' ,
                        orderable: true ,
                        searchable: false ,
                        visible: false
                    } ,
                    {
                        "data": 'users_table' ,
                        render: function (data) {
                            return data['name']
                        } ,
                    } ,
                    {
                        "data": 'create_date' ,
                    } ,
                    {
                        "class": "" ,
                        "orderable": false ,
                        "data": null ,
                        "defaultContent": strBtnAction
                    }
                ] ,
            });

            $('#data-server-side tbody').on('click' , 'tr td button.details-control' , function () {
                var tr = $(this).closest('tr');
                var row = dt.row(tr);
                var data = row.data();

                window.location.href = "{{url('product-category')}}/" + data['id'];
            });

            $('#data-server-side tbody').on('click' , 'tr td button.edit-control' , function () {
                let tr = $(this).closest('tr');
                let row = dt.row(tr);
                let data = row.data();
                setValueFormEdit(data);
            });

            $('#data-server-side tbody').on('click' , 'tr td button.delete-control' , function () {
                let tr = $(this).closest('tr');
                let row = dt.row(tr);
                let data = row.data();
                onDelete(data['id'])
            });
        }

        function checkStatus(data) {
            if (data === 1) {
                return '<span class="label label-pill label-success">เปิดใช้งาน</span>';
            }
            else {
                return '<span class="label label-pill label-danger">ระงับใช้งาน</span>';
            }
        }

        function setValueFormEdit(data) {
            document.getElementById('IdEdit').value = data['id'];
            document.getElementById('CategoryNameEdit').value = data['CategoryName'];
            document.getElementById('statusEdit').checked = data['CategoryStatus'] === 0;
            $("#myModalUpdate").modal()
        }

        function ccin() {
            document.getElementById('CategoryName').value = "";
            document.getElementById('status').checked = false;
        }

        function checkInput() {
            let name = document.getElementById('CategoryName').value;
            if (name) {
                $('#myModalInsert').modal('toggle');
                onSave();
            }
            else {
                $('#myModalInsert').modal('toggle');
                swal({
                    title: "กรุณากรอกข้อมูลให้ครบถ้วน" ,
                    text: "" ,
                    // timer: 2000,
                    type: "error" ,
                    showConfirmButton: true ,
                    confirmButtonText: 'ตกลง'
                }).then(function () {
                    $("#myModalInsert").modal('show')
                });
            }

        }

        function onSave() {
            let name = document.getElementById('CategoryName').value;
            let status = document.getElementById('status').checked;
            swal.queue([{
                title: 'เพิ่มข้อมูลหรือไม่ ?' ,
                type: 'question' ,
                showCancelButton: true ,
                confirmButtonText: 'ตกลง' ,
                cancelButtonText: 'ยกเลิก' ,
                text:
                    'กดปุ่ม "ตกลง" เพื่อยืนยันการบันทึกข้อมูล' ,
                showLoaderOnConfirm: true ,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        let form = $('#formInsert')[0];
                        let data = new FormData(form);
                        $.ajax({
                            type: "POST" ,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            } ,
                            enctype: 'multipart/form-data' ,
                            url: '{{url('product-category')}}' ,
                            data: data ,
                            processData: false ,
                            contentType: false ,
                            timeout: 10000 ,
                            cache: false ,
                            success: function (data) {
                                console.log(data);
                                if (data.status === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('product-category')}}";
                                    } , 500);
                                    swal({
                                        title: "ทำรายการสำเร็จแล้ว" ,
                                        timer: 2000 ,
                                        type: "success" ,
                                        showConfirmButton: false
                                    });
                                }
                            } ,
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด" ,
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง." ,
                                    // timer: 2000,
                                    type: "error" ,
                                    howConfirmButton: true ,
                                    confirmButtonText: 'ตกลง'
                                });
                            }
                        });
                    })
                }
            }]).then(function () {
                document.getElementById('CategoryName').value = name;
                document.getElementById('status').checked = status;
                $("#myModalInsert").modal('show')
            });
        }

        function checkInputUpdate() {
            let name = document.getElementById('CategoryNameEdit').value;
            let id = document.getElementById('IdEdit').value;
            if (name) {
                $('#myModalUpdate').modal('toggle');
                onUpdate(id);
            }
            else {
                $('#myModalUpdate').modal('toggle');
                swal({
                    title: "กรุณากรอกข้อมูลให้ครบถ้วน" ,
                    text: "" ,
                    // timer: 2000,
                    type: "error" ,
                    showConfirmButton: true ,
                    confirmButtonText: 'ตกลง'
                }).then(function () {
                    $("#myModalUpdate").modal()
                });
            }
        }

        function onUpdate(id) {
            swal.queue([{
                title: 'อัพเดทข้อมูลหรือไม่ ?' ,
                type: 'question' ,
                showCancelButton: true ,
                confirmButtonText: 'ตกลง' ,
                cancelButtonText: 'ยกเลิก' ,
                text:
                    'กดปุ่ม "ตกลง" เพื่อยืนยันการอัพเดทข้อมูล' ,
                showLoaderOnConfirm: true ,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        var form = $('#formUpdate')[0];
                        var data = new FormData(form);
                        $.ajax({
                            type: 'POST' ,
                            enctype: 'multipart/form-data' ,
                            url: '{{url('product-category')}}/' + id ,
                            data: data ,
                            processData: false ,
                            contentType: false ,
                            timeout: 30000 ,
                            cache: false ,
                            success: function (data) {
                                if (data.status === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('product-category')}}";
                                    } , 500);
                                    swal({
                                        title: "อัพเดทข้อมูลสำเร็จแล้ว" ,
                                        timer: 5000 ,
                                        type: "success" ,
                                        showConfirmButton: false
                                    });
                                }
                            } ,
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด" ,
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง." ,
                                    timer: 2000 ,
                                    type: "error" ,
                                    showConfirmButton: true ,
                                    confirmButtonText: 'ตกลง' ,
                                });
                            }
                        });
                    })
                }
            }]).then(function () {
                $('#myModalUpdate').modal()
            });
        }

        function onDelete(id) {
            swal.queue([{
                title: 'ยืนยันการลบ ?' ,
                type: 'question' ,
                showCancelButton: true ,
                confirmButtonText: 'ตกลง' ,
                cancelButtonText: 'ยกเลิก' ,
                text: 'กดปุ่ม "ตกลง" เพื่อยืนยันการทำรายการ' ,
                showLoaderOnConfirm: true ,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        console.log(id);
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            } ,
                            type: "POST" ,
                            url: '{{url('product-category')}}/' + id ,
                            data: {
                                "_method": 'DELETE'
                            } ,
                            timeout: 3000 ,
                            cache: false ,
                            success: function (data) {
                                console.log(data);
                                if (data === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('product-category')}}";
                                    } , 500);
                                    swal({
                                        title: "ทำรายการสำเร็จแล้ว" ,
                                        timer: 2000 ,
                                        type: "success" ,
                                        showConfirmButton: false
                                    });
                                }
                                else if (data === 'NoDelete') {
                                    swal({
                                        title: "อุ๊ปส์ เกิดข้อผิดพลาด" ,
                                        text: "ไม่สามารถลบหมวดหมู่นี้ได้ เนื่องจากกำลังถูกใช้งาน." ,
                                        // timer: 2000,
                                        type: "error" ,
                                        howConfirmButton: true ,
                                        confirmButtonText: 'ตกลง'
                                    });
                                }
                            } ,
                            error: function (data) {
                                swal({
                                    title: "อุ๊ปส์ เกิดข้อผิดพลาด" ,
                                    text: "เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง." ,
                                    // timer: 2000,
                                    type: "error" ,
                                    howConfirmButton: true ,
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
