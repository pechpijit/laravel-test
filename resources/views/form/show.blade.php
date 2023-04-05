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
                        <h4 class="card-title">ฟอร์มเบิกอุปกรณ์</h4>
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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data->formDetailTable as $key => $row)
                                                <tr class="items list-product">
                                                    <td><label class="col-form-label">{{$row->categoryTable->CategoryName}}</label></td>
                                                    @if($row->type == 1)
                                                        <td><label class="col-form-label">{{$row->productsTable->ProductName}}</label></td>
                                                        <td align="right"><label class="col-form-label">{{$row->productsTable->ProductPrice}}</label></td>
                                                    @else
                                                        <td><label class="col-form-label">{{$row->other_name}}</label></td>
                                                        <td align="right"><label class="col-form-label">{{$row->other_price}}</label></td>
                                                    @endif
                                                    <td><label class="col-form-label">{{$row->description}}</label></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 mb-5">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="col-form-label">หมายเหตุ:</label>
                                            <p>{{$data->description}}</p>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group" style="text-align: right;">
                                                <label class="col-form-label">ยอดรวม</label>
                                                <div class="col-md-8 input-group pull-right">
                                                    <input type="number" class="form-control" id="Total" name="Total" value="{{$data->sum_other_price}}" readonly>
                                                    <div class="input-group-append"><span class="input-group-text">฿</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('form')}}" class="btn btn-primary pull-left">ย้อนกลับ</a>
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
@endsection
