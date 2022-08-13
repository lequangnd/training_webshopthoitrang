@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>

                        <th>Mã hóa đơn</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Giá</th>
                        <th>Số lượng</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($billdetails->details as $bill)
                    <tr class="spacer"></tr>
                    <tr class="tr-shadow">

                        <td>{{$bill->bill_id}}</td>
                        <td>
                            {{$bill->products_details->name}}
                        </td>
                        <td>
                            {{$bill->size}}
                        </td>
                        <td>
                            {{$bill->color}}
                        </td>
                        <td>{{$bill->products_details->price}}</td>
                        <td>{{$bill->number}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{route('updatedetails',['id'=>$bill->id])}}"
                                    class="text-decoration-none">Sửa</a>

                                <a class="ml-3" href="{{route('deletedetails',['id'=>$bill->id])}}"
                                    class="text-decoration-none">Xóa</a>

                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection