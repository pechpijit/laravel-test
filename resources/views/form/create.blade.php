@extends('layouts.main')
@section('head')
    <link href="{{asset('template/css/validator.css')}}" rel="stylesheet">
    <style>
        .add-orders tr th,
        .add-orders tr td,
        .orderPayment .nav-item {
            border: 1px solid #ddd;
        }

        .social li {
            text-align: center;
            cursor: pointer;
        }

        #data-server-side {
            margin: auto;
        }

        div.container {
            width: 80%;
        }

        .modal-body .table-responsive {
            margin-top: -30px;
            margin-bottom: 10px;
        }

        @media (min-width: 576px) {
            .modal-dialog {
                max-width: 900px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="modal fade" id="myModalProductList">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">เลือกอุปกรณ์</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table zero-configuration" id="data-server-side" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>หมวดหมู่</th>
                                                    <th>ชื่อสินค้า</th>
                                                    <th>ราคา</th>
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
                        <div class="modal fade" id="myModalInsert">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">เพิ่มอุปกรณ์อื่นๆ</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formInsert" autocomplete="off">
                                            <div class="form-group">
                                                <label for="c" class="col-form-label">ชื่ออุปกรณ์:</label>
                                                <textarea type="text" class="form-control" id="OtherDetail" name="OtherDetail" rows="5"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="CategoryMaxRequest" class="col-form-label">ราคา</label>
                                                <input type="number" class="form-control" id="OtherPrice" name="OtherPrice" value="0">
                                            </div>
                                            <div class="form-group">
                                                <label for="category_id" class="col-form-label">หมวดหมู่อุปกรณ์:</label>
                                                <select id="category_id" class="selectpicker select-insert" data-live-search="true" title="เลือกหมวดหมู่อุปกรณ์" name="category_id">
                                                    @foreach($category as $key => $val)
                                                        <option value="{{$val->id}}" data-maxrequest="{{$val->CategoryMaxRequest}}">{{$val->CategoryName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal"
                                                onclick="ccin()">ยกเลิก
                                        </button>
                                        <button type="button" class="btn btn-primary" onclick="checkInput()">เพิ่ม
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">สร้างแบบฟอร์มเบิกอุปกรณ์</h4>
                        <div class="table-responsive">
                            <form id="insertOrder" action="{{url('form')}}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table add-orders" id="data-products">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 10%;">หมวดหมู่</th>
                                                <th class="text-center">ชื่อ</th>
                                                <th class="text-center">ราคา</th>
                                                <th class="text-center">หมายเหตุ</th>
                                                <th class="text-center" style="width: 10%;">ลบ</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalProductList">
                                            เพิ่มอุปกรณ์ <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalInsert">
                                            เพิ่มอุปกรณ์อื่นๆ <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 mb-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="col-form-label">หมายเหตุ:</label>
                                            <textarea type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5"></textarea>
                                            @error('note')
                                            <div id="val-username-error" class="invalid-feedback animated fadeInDown" style="display: block;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{--                                        <div class="form-group col-md-4">--}}
                                        {{--                                            <a href="{{url()->previous()}}">--}}
                                        {{--                                                <button type="button" class="btn btn-danger pull-left">กลับ</button>--}}
                                        {{--                                            </a>--}}
                                        {{--                                            <button type="button" class="btn btn-primary pull-right" onclick="checkInput()">เพิ่ม</button>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                                <button type="button" onclick="submit()" class="btn btn-primary pull-right">เพิ่ม</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        // $('.remove_field').css('cursor','pointer');
        // $(document).on("click",".remove_field",function(){
        //     $(this).parent().parent().parent().remove();
        // });
        // $("#btnNewRow").click(function(e){
        //     e.preventDefault();
        //     $('#luckyRow').before('<div class="input-group mb-3"> <input type="text" class="form-control luckyCode" placeholder="Code" name="evoucher[]" required> <div class="input-group-append"> <span class="input-group-text"><i class="remove_field fas fa-trash-alt" style="cursor: pointer;"></i></span> </div> </div>');
        // });
    </script>

    <script>
        $(document).ready(function () {
            swal('กรุณารอสักครู่...');
            swal.showLoading();
            loadDatable();
        });

        const objProduct = [];

        function loadDatable() {
            var dt = $('#data-server-side').DataTable({
                processing: true ,
                serverSide: true ,
                destroy: true ,
                ajax: {
                    url: '{{ url('products/all') }}' ,
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
                        data: 'category_table' ,
                        orderable: true ,
                        searchable: false ,
                        visible: true ,
                        render: function (data) {
                            return data['CategoryName']
                        } ,
                    } ,
                    { data: 'ProductName' } ,
                    { data: 'ProductPrice' } ,

                ]
            });


            let table = $('#data-server-side').DataTable();
            $('#data-server-side tbody').on('click' , 'tr' , function () {
                let data = table.row(this).data();
                if (checkMaxRequest(data['category_table']['CategoryMaxRequest'] , data['category_id'])) {
                    let dataProduct = ' <tr class="items list-product">'
                        + '<td style="display:none;">' + data['category_id'] + '</td>'
                        + '<td><label class="col-form-label">' + data['category_table']['CategoryName'] + '</label><input class="form-control" name="items[0][category_id]" type="hidden" value="' + data['category_id'] + '"></td>'
                        + '<td><label class="col-form-label">' + data['ProductName'] + '</label><input class="form-control" name="items[0][product_id]" type="hidden" value="' + data['id'] + '"><input class="form-control" name="items[0][type]" type="hidden" value="1"></td>'
                        + '<td><label class="col-form-label">' + data['ProductPrice'] + '</label></td>'
                        + '<td><input class="form-control" name="items[0][description]" type="text" value="" placeholder="หมายเหตุเพิ่มเติม"></td>'
                        + '<td style="text-align: center;"><button class="btn btn-danger deleteProduct" type="button"><i class="fa fa-trash"></i></button></td>'
                        + '</tr>';
                    $('#data-products tbody').append(dataProduct);
                    renameTableIndex()
                }
                else {
                    swal({
                        title: `ไม่สามารถเบิกอุปกรณ์เพิ่มได้` ,
                        text: `หมวดหมู่ "${ data['category_table']['CategoryName'] }" เบิกได้ไม่เกิน ${ data['category_table']['CategoryMaxRequest'] } หน่วย` ,
                        timer: 4000 ,
                        type: "error" ,
                        showConfirmButton: false
                    });
                }
            });
        }

        function checkMaxRequest(maxRequest , categoryId) {
            console.log('===checkMaxRequest===')
            console.log('maxRequest' , maxRequest)
            console.log('categoryId' , categoryId)

            let allCells = $('#data-products tbody tr td:nth-child(1)');
            let categoryCount = [];

            allCells.each(function () {
                if (categoryCount[$(this).text()] === undefined) {
                    categoryCount[$(this).text()] = 1
                }
                else {
                    categoryCount[$(this).text()] = categoryCount[$(this).text()] + 1;
                }
            });

            if (maxRequest === -1) {
                return true
            }
            else if (maxRequest > 0) {
                if (categoryCount[categoryId] === undefined || categoryCount[categoryId] < maxRequest) {
                    return true;
                }
            }
        }

        //ลบrecordสินค้า
        $(document).on('click' , '.deleteProduct' , function () {
            var divleat = $('.add-orders').find('.list-product').length;

            if (divleat > 0) {
                $(this).closest('.list-product').fadeOut(function () {
                    this.remove();
                });
            }
        });

        function ccin() {
            document.getElementById('OtherDetail').value = "";
            document.getElementById('OtherPrice').value = 0;
        }

        function checkInput() {
            let OtherDetail = document.getElementById('OtherDetail').value;
            let price = document.getElementById('OtherPrice').value;
            let categoryId = $('#category_id').val();
            let categoryText = $('#category_id :selected').text();
            if (OtherDetail && price && categoryId) {
                let selected = $('#category_id').find('option:selected');
                let maxrequest = selected.data('maxrequest');

                console.log('maxrequest' , maxrequest)
                console.log('categoryText' , categoryText)

                if (checkMaxRequest(maxrequest , categoryId)) {
                    let dataProduct = ' <tr class="items list-product">'
                        + '<td style="display:none;">' + categoryId + '</td>'
                        + '<td><label class="col-form-label">' + categoryText + '</label><input class="form-control" name="items[0][category_id]" type="hidden" value="' + categoryId + '"></td>'
                        + '<td><label class="col-form-label">' + OtherDetail + '</label><input class="form-control" name="items[0][other_name]" type="hidden" value="' + OtherDetail + '"><input class="form-control" name="items[0][type]" type="hidden" value="2"></td>'
                        + '<td><label class="col-form-label">' + price + '</label><input class="form-control" name="items[0][other_price]" type="hidden" value="' + price + '"></td>'
                        + '<td><input class="form-control" name="items[0][description]" type="text" value="" placeholder="หมายเหตุเพิ่มเติม"></td>'
                        + '<td style="text-align: center;"><button class="btn btn-danger deleteProduct" type="button"><i class="fa fa-trash"></i></button></td>'
                        + '</tr>';
                    $('#data-products tbody').append(dataProduct);

                    renameTableIndex();
                    $('#myModalInsert').modal('toggle');
                }
                else {
                    swal({
                        title: `ไม่สามารถเบิกอุปกรณ์เพิ่มได้` ,
                        text: `หมวดหมู่ "${ categoryText }" เบิกได้ไม่เกิน ${ maxrequest } หน่วย` ,
                        timer: 4000 ,
                        type: "error" ,
                        showConfirmButton: false
                    });
                }
            }
            else {
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

        function submit() {
            $('#insertOrder').submit()
        }

        //เพิ่มrecordสินค้า
        // function addProduct(ID) {
        //     var dataProduct = ' <tr class="items list-product">'
        //         + '<td></td>'
        //         + '<td><label class="col-form-label">' + ID + '</label></td>'
        //         + '<td><input class="form-control" name="items[0][tb_amount]" type="number"></td>'
        //         + '<td><input class="form-control" name="items[0][tb_price]" type="number"></td>'
        //         + '<td><input class="form-control" name="items[0][tb_discount]" type="number" min="0"></td>'
        //         + '<td style="text-align: right;"><label class="col-form-label">1,000</label></td>'
        //         + '<td style="text-align: center;"><button class="btn btn-danger deleteProduct" type="button"><i class="fa fa-trash"></i></button></td>'
        //         + '</tr>';
        //
        //     $('#data-products tbody').append(dataProduct);
        //     renameTableIndex()
        // }


        //rename recordสินค้า
        function renameTableIndex() {
            $('#data-products tbody tr').each((index , value) => {
                var prefix = "items[" + index + "]";
                $(value).find("input").each(function () {
                    this.name = this.name.replace(/items\[\d+\]/ , prefix);
                });
            })
        }

        function verify() {
            var validate = true;
            const input = [
                'order_code' ,
                'CustomerName' ,
                'SocialContact' ,
                'Phone1' ,
                'Address' ,
                'Province' ,
                'District' ,
                'SubDistrict' ,
                'Zipcode' ,
                'logistic_id'
            ]

            $.each(input , function (index , value) {
                const val = $('#' + value).val();
                if (!val) {
                    validate = false;
                    showValidate(value)
                }
                else {
                    hideValidate(value)
                }

                // $('#' + value).focusout(function() {
                //     const val = $('#' + value).val();
                //     if (!val) {
                //         validate = false;
                //         showValidate(value)
                //     }else{
                //         hideValidate(value)
                //     }
                // });
                //
                // $('#' + value).change(function() {
                //     const val = $('#' + value).val();
                //     if (!val) {
                //         validate = false;
                //         showValidate(value)
                //     }else{
                //         hideValidate(value)
                //     }
                // });
            });

            const inputPayment = [
                'PaymentTime' ,
                'PaymentPrice' ,
                'min-date'
            ]
            const PaymentChannel = $('#PaymentChannel').val();

            if (PaymentChannel === 'transfer') {
                $.each(inputPayment , function (index , value) {
                    const val = $('#' + value).val();
                    if (!val) {
                        validate = false;
                        showValidate(value)
                    }
                    else {
                        hideValidate(value)
                    }

                    // $('#' + value).focusout(function() {
                    //     const val = $('#' + value).val();
                    //     if (!val) {
                    //         validate = false;
                    //         showValidate(value)
                    //     }else{
                    //         hideValidate(value)
                    //     }
                    // });
                    //
                    // $('#' + value).change(function() {
                    //     const val = $('#' + value).val();
                    //     if (!val) {
                    //         validate = false;
                    //         showValidate(value)
                    //     }else{
                    //         hideValidate(value)
                    //     }
                    // });
                });
            }
            else {
                hideValidate('PaymentPrice')
                hideValidate('PaymentDate')
            }
            return validate
        }

        var validate = true;

        // function checkInput() {
        //     validate = true
        //     validate = verify();
        //
        //     if (validate) {
        //
        //         if (objProduct.length <= 0) {
        //             swal({
        //                 title: "กรุณาเพิ่มสินค้า" ,
        //                 text: "" ,
        //                 // timer: 2000,
        //                 type: "error" ,
        //                 showConfirmButton: true ,
        //                 confirmButtonText: 'ตกลง'
        //             }).then(function () {
        //             });
        //             return
        //         }
        //         onSave();
        //     }
        //     else {
        //         swal({
        //             title: "กรุณากรอกข้อมูลให้ครบถ้วน" ,
        //             text: "" ,
        //             // timer: 2000,
        //             type: "error" ,
        //             showConfirmButton: true ,
        //             confirmButtonText: 'ตกลง'
        //         }).then(function () {
        //         });
        //     }
        //
        // }

        function showValidate(value) {
            $('#' + value).addClass("is-invalid");
            $('#val-' + value + '-error').show();
        }

        function hideValidate(value) {
            $('#' + value).removeClass("is-invalid");
            $('#val-' + value + '-error').hide();
        }

        function onSave() {
            const District = $('#District').val();
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
                        var form = $('#insertOrder')[0];
                        var data = new FormData(form);
                        $.ajax({
                            type: "POST" ,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            } ,
                            enctype: 'multipart/form-data' ,
                            url: '{{url('order')}}' ,
                            data: data ,
                            processData: false ,
                            contentType: false ,
                            timeout: 10000 ,
                            cache: false ,
                            success: function (data) {
                                console.log(data);
                                if (data.status === 'success') {
                                    setTimeout(function () {
                                        window.location.href = "{{url('order/')}}";
                                    } , 500);
                                    swal({
                                        title: "ทำรายการสำเร็จแล้ว" ,
                                        timer: 2000 ,
                                        type: "success" ,
                                        showConfirmButton: false
                                    });
                                }
                                else if (data.status === 'PostFail') {
                                    swal({
                                        title: "อำเภอ" + District + " อยู่ในพื้นที่ห่างไกล" ,
                                        type: "warning" ,
                                        showConfirmButton: true
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
                // $("#myModalInsert").modal('show')
            });
        }

        // const isNumericInput = (event) => {
        //     const key = event.keyCode;
        //     return key
        //     ((key >= 48 && key <= 57) || // Allow number line
        //         (key >= 96 && key <= 105) // Allow number pad
        //     );
        // };

        const isModifierKey = (event) => {
            const key = event.keyCode;
            return event.shiftKey
            // (event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
            //     (key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
            //     (key > 36 && key < 41) || // Allow left, up, right, down
            //     (
            //         // Allow Ctrl/Command + A,C,V,X,Z
            //         (event.ctrlKey === true || event.metaKey === true) &&
            //         (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
            //     )
        };

        const enforceFormat = (event) => {
            // Input must be of a valid number format or a modifier key, and not longer than ten digits
            if (!isNumericInput(event) && !isModifierKey(event)) {
                event.preventDefault();
            }
        };

        const formatToPhone = (event) => {
            if (isModifierKey(event)) {
                return;
            }

            const target = event.target;
            const input = event.target.value.replace(/\D/g , '').substring(0 , 20); // First ten digits of input only
            const zip = input.substring(0 , 3);
            const middle = input.substring(3 , 6);
            const last = input.substring(6 , 10); // defult (6,10)

            if (input.length > 6) {
                target.value = `(${ zip }) ${ middle } - ${ last }`;
            }
            else if (input.length > 3) {
                target.value = `(${ zip }) ${ middle }`;
            }
            else if (input.length > 0) {
                target.value = `(${ zip }`;
            }
        };

        // const inputElement = document.getElementById('Phone1');
        // inputElement.addEventListener('keydown',enforceFormat);
        // inputElement.addEventListener('keyup',formatToPhone);
    </script>
@endsection
