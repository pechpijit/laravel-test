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
                        <h4 class="card-title">สร้างแบบฟอร์มเบิกอุปกรณ์</h4>
                        <div class="table-responsive">
                            <form id="insertOrder" action="{{url('form')}}" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table add-orders" id="data-products">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="width: 30%;">ชื่อ</th>
                                                <th class="text-center" style="width: 10%;">หมายเหตุ</th>
                                                <th class="text-center" style="width: 10%;">ลบ</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalProductList">เพิ่มเบิกอุปกรณ์ <span class="btn-icon-right"><i
                                                    class="fa fa-plus"></i></span></button>
                                        <div class="modal fade" id="myModalProductList">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">เลือกสินค้า</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table zero-configuration" id="data-server-side" style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>รูป</th>
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
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="col-form-label">หมายเหตุ:</label>
                                            <textarea type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" rows="5" maxlength="80"></textarea>
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

        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{url('api/autocomplete/fetch')}}" ,
                    method: 'POST' ,
                    data: { query: query } ,
                    dataType: 'json' ,
                    success: function (data) {
                        $('#listSearch').html(data.data);
                    }
                })
            }

            $(document).on('keyup' , '#CustomerName' , function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });

    </script>

    <script>
        function selectSearch(id) {
            swal('กรุณารอสักครู่...');
            swal.showLoading();

            $.ajax({
                url: "{{url('api/search/order')}}" ,
                method: 'POST' ,
                data: { id: id } ,
                dataType: 'json' ,
                success: function (data) {
                    console.log(data)
                    $('#CustomerName').val(data.CustomerName);
                    $('#Phone1').val(data.Phone1);
                    $('#Province').val(data.Province);
                    $('#District').val(data.District);
                    $('#SubDistrict').val(data.SubDistrict);
                    $('#Zipcode').val(data.Zipcode);
                    $('#Address').html(data.Address);
                    swal.close();
                }
            })

            $('#listSearch').html('');
        }

        $(document).ready(function () {
            swal('กรุณารอสักครู่...');
            swal.showLoading();
            loadDatable();
        });

        function phoneMask() {
            var num = $(this).val().replace(/\D/g , '');
            if (num.length >= 1 && num.length <= 3) {
                $(this).val(num.substring(0 , num.length));
            }
            else if (num.length >= 4 && num.length <= 6) {
                $(this).val('(' + num.substring(0 , 3) + ') ' + num.substring(3 , num.length));
            }
            else if (num.length >= 7 && num.length <= 10) {
                $(this).val('(' + num.substring(0 , 3) + ') ' + num.substring(3 , 6) + ' - ' + num.substring(6 , num.length));
            }
        }

        $('#Phone1').keyup(phoneMask);
        $('#Phone2').keyup(phoneMask);

        function timeMask() {
            var num = $(this).val().replace(/\D/g , '');
            if (num.length >= 1 && num.length <= 2) {
                if (num.substring(0 , num.length) >= 0 && num.substring(0 , num.length) <= 23) {
                    $(this).val(num.substring(0 , num.length));
                }
                else {
                    $(this).val('');
                }
            }
            else if (num.length >= 3 && num.length <= 4) {
                console.log(num.substring(0 , num.length) <= 23);
                if (num.substring(2 , num.length) >= 0 && num.substring(2 , num.length) <= 59) {
                    $(this).val(num.substring(0 , 2) + ':' + num.substring(2 , num.length));
                }
                else {
                    $(this).val(num.substring(0 , 2) + ':');
                }
            }
        }

        $('#PaymentTime').keyup(timeMask);

        function submit() {
            $('#insertOrder').submit()
        }

        const objProduct = [];

        function loadDatable() {
            var dt = $('#data-server-side').DataTable({
                processing: true ,
                serverSide: true ,
                destroy: true ,
                ajax: {
                    url: '{{ url('products/') }}' ,
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
                    { data: 'ProductImage' } ,
                    { data: 'ProductName' } ,
                    { data: 'ProductPrice' } ,
                ]
            });

            var table = $('#data-server-side').DataTable();
            $('#data-server-side tbody').on('click' , 'tr' , function () {
                var data = table.row(this).data();
                var allCells = $('#data-products tbody tr td:nth-child(1)');
                var textMapping = {};
                var status = 'TRUE';

                allCells.each(function () {
                    textMapping[$(this).text().toLowerCase()] = true;
                });

                for (var text in textMapping) {
                    if (text == data['id']) {
                        status = 'FALSE';
                    }
                }

                // console.log(status);
                if (status == 'TRUE') {
                    var dataProduct = ' <tr class="items list-product">'
                        + '<td style="display:none;">' + data['id'] + '</td>'
                        + '<td>' + data['ProductImage'] + '</td>'
                        + '<td><label class="col-form-label">' + data['ProductName'] + '</label><input class="form-control" name="items[0][ProductId]" type="hidden" value="' + data['id'] + '"><input class="form-control" name="items[0][ProductName]" type="hidden" value="' + data['ProductName'] + '"></td>'
                        + '<td><input class="form-control" id="items-' + data['id'] + '-tb_amount" name="items[0][tb_amount]" type="number" value="1"></td>'
                        + '<td><input class="form-control" id="items-' + data['id'] + '-tb_price" name="items[0][tb_price]" type="number" value="' + data['ProductPrice'] + '"></td>'
                        + '<td><input class="form-control" id="items-' + data['id'] + '-tb_discount" name="items[0][tb_discount]" type="number" min="0" value="0"></td>'
                        + '<td style="text-align: right;"><label class="col-form-label" id="items-' + data['id'] + '-sum">' + data['ProductPrice'] + '</label></td>'
                        + '<td style="text-align: center;"><button class="btn btn-danger deleteProduct" type="button"><i class="fa fa-trash"></i></button></td>'
                        + '</tr>';
                    $('#data-products tbody').append(dataProduct);

                    let temp = {
                        tb_amount: '1' ,
                        tb_price: data['ProductPrice'] ,
                        tb_discount: '0' ,
                    };
                    objProduct.push(temp);

                    var index = objProduct.length - 1

                    $('#items-' + data['id'] + '-tb_amount').change(function () {
                        let value = $('#items-' + data['id'] + '-tb_amount').val()
                        if (value === '') {
                            $('#items-' + data['id'] + '-tb_amount').val('1')
                            value = '1'
                        }

                        $('#items-' + data['id'] + '-tb_amount').val(parseFloat(value))
                        objProduct[index]['tb_amount'] = value
                        console.log(objProduct[index])
                        sumItems(data['id'])
                        sumProductPrice(objProduct);
                    });

                    $('#items-' + data['id'] + '-tb_price').change(function () {
                        let value = $('#items-' + data['id'] + '-tb_price').val()
                        if (value === '') {
                            $('#items-' + data['id'] + '-tb_price').val('0')
                            value = '0'
                        }

                        $('#items-' + data['id'] + '-tb_price').val(parseFloat(value))
                        objProduct[index]['tb_price'] = value
                        console.log(objProduct[index])
                        sumItems(data['id'])
                        sumProductPrice(objProduct);
                    });

                    $('#items-' + data['id'] + '-tb_discount').change(function () {
                        let value = $('#items-' + data['id'] + '-tb_discount').val()
                        if (value === '') {
                            $('#items-' + data['id'] + '-tb_discount').val('0')
                            value = '0'
                        }

                        $('#items-' + data['id'] + '-tb_discount').val(parseFloat(value))
                        objProduct[index]['tb_discount'] = value
                        console.log(objProduct[index])
                        sumItems(data['id'])
                        sumProductPrice(objProduct);
                    });

                    function sumItems(id) {
                        console.log('sumItems')
                        let tb_amount = $('#items-' + id + '-tb_amount').val()
                        let tb_price = $('#items-' + id + '-tb_price').val()
                        let tb_discount = $('#items-' + id + '-tb_discount').val()
                        console.log((parseFloat(tb_amount) * parseFloat(tb_price)) - parseFloat(tb_discount))
                        $('#items-' + id + '-sum').text((parseFloat(tb_amount) * parseFloat(tb_price)) - parseFloat(tb_discount))
                    }

                    $('#items-' + data['id'] + '-tb_amount').focus(function () {
                        $(this).select();
                    });

                    $('#items-' + data['id'] + '-tb_price').focus(function () {
                        $(this).select();
                    });

                    $('#items-' + data['id'] + '-tb_discount').focus(function () {
                        $(this).select();
                    });

                    sumProductPrice(objProduct);
                }
                else if (status == 'FALSE') {
                    swal({
                        title: "เพิ่มรหัสสินค้านี้แล้ว" ,
                        text: "ใช้การเพิ่มจำนวนสินค้าในหน้าหลัก." ,
                        timer: 2000 ,
                        type: "error" ,
                        showConfirmButton: false
                    });
                }

                renameTableIndex()
            });
        }

        $(document).on('click' , '.hidePill' , function () {
            $('#pills-transfer').removeClass('active');
            $('#pills-transfer').removeClass('show');
        });

        //input selectData
        function selectData(type , data) {
            if (type == 'SocialChannel') {
                document.getElementById("SocialChannel").value = data;
            }
            else if (type == 'PaymentChannel') {
                document.getElementById("PaymentChannel").value = data;
            }
            else if (type == 'PaymentBanking') {
                document.getElementById("PaymentBanking").value = data;
            }
        }

        $('#DeliveryCost').focus(function () {
            $(this).select();
        });

        $('#Discount').focus(function () {
            $(this).select();
        });

        $('#DeliveryCost').keyup(function () {
            let value = $('#DeliveryCost').val()
            if (value === '') {
                $('#DeliveryCost').val('0')
                value = '0'
            }

            $('#DeliveryCost').val(parseFloat(value))
            sumTotal()
        });

        $('#Discount').keyup(function () {
            let value = $('#Discount').val()
            if (value === '') {
                $('#Discount').val('0')
                value = '0'
            }

            $('#Discount').val(parseFloat(value))

            sumTotal()
        });

        var sumProPrice = 0
        var sumDisc = 0

        function sumProductPrice(objProduct) {
            var sumProductPrice = 0
            var sumDiscount = 0
            $.each(objProduct , function (i , val) {
                sumProductPrice += parseFloat(val['tb_price']) * parseFloat(val['tb_amount'])
                sumDiscount += parseFloat(val['tb_discount'])

                console.log('tb_amount : ' + val['tb_amount'] + ', tb_price : ' + val['tb_price'] + ', tb_discount : ' + val['tb_discount']);
            });
            //ราคาสินค้าอย่างเดียว
            sumProPrice = sumProductPrice;
            sumDisc = sumDiscount;
            console.log('sumProPrice : ' + sumProPrice + ', sumDisc : ' + sumDisc);

            var DeliveryCost = $('#DeliveryCost').val()
            var Discount = $('#Discount').val()

            //ราคาสินค้ารวมค่าส่งและส่วนลด
            sumProductPrice += parseFloat(DeliveryCost)
            sumDiscount += parseFloat(Discount)

            var total = parseFloat(sumProductPrice) - parseFloat(sumDiscount)
            $('#DiscountSum').val(sumDiscount)
            $('#Total').val(total)
            console.log('sumProductPrice : ' + sumProductPrice + ', sumDiscount : ' + sumDiscount);
        }


        function sumTotal() {
            var DeliveryCost = parseFloat($('#DeliveryCost').val()) + sumProPrice
            var Discount = parseFloat($('#Discount').val()) + sumDisc

            var total = parseFloat(DeliveryCost) - parseFloat(Discount)

            $('#DiscountSum').val(Discount)
            $('#Total').val(total)
            console.log('total : ' + total);
        }

        //เพิ่มrecordสินค้า
        function addProduct(ID) {
            var dataProduct = ' <tr class="items list-product">'
                + '<td></td>'
                + '<td><label class="col-form-label">' + ID + '</label></td>'
                + '<td><input class="form-control" name="items[0][tb_amount]" type="number"></td>'
                + '<td><input class="form-control" name="items[0][tb_price]" type="number"></td>'
                + '<td><input class="form-control" name="items[0][tb_discount]" type="number" min="0"></td>'
                + '<td style="text-align: right;"><label class="col-form-label">1,000</label></td>'
                + '<td style="text-align: center;"><button class="btn btn-danger deleteProduct" type="button"><i class="fa fa-trash"></i></button></td>'
                + '</tr>';

            $('#data-products tbody').append(dataProduct);
            renameTableIndex()
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

        //rename recordสินค้า
        function renameTableIndex() {
            $('#data-products tbody tr').each((index , value) => {
                var prefix = "items[" + index + "]";
                $(value).find("input").each(function () {
                    this.name = this.name.replace(/items\[\d+\]/ , prefix);
                });
            })
        }

        $.Thailand({
            $search: $('#search') ,
            onDataFill: function (data) {
                var address = data.district + ' ' + data.amphoe + ' ' + data.province + ' ' + data.zipcode
                $('#showSearch').html('ที่อยู่: ' + address);

                document.getElementById("Province").value = data.province;
                document.getElementById("District").value = data.amphoe;
                document.getElementById("SubDistrict").value = data.district;
                document.getElementById("Zipcode").value = data.zipcode;
                verify();
            }
        });

        $.Thailand({
            $district: $('#SubDistrict') ,
            $amphoe: $('#District') ,
            $province: $('#Province') ,
            $zipcode: $('#Zipcode')
        });

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

        function checkInput() {
            validate = true
            validate = verify();

            if (validate) {

                if (objProduct.length <= 0) {
                    swal({
                        title: "กรุณาเพิ่มสินค้า" ,
                        text: "" ,
                        // timer: 2000,
                        type: "error" ,
                        showConfirmButton: true ,
                        confirmButtonText: 'ตกลง'
                    }).then(function () {
                    });
                    return
                }
                onSave();
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
                });
            }

        }

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
