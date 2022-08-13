@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive table-responsive-data2">
            <table class="table table-data2">
                <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                    <tr class="spacer"></tr>
                    <tr class="tr-shadow">

                        <td>{{$bill->users->name}}</td>
                        <td>
                            {{$bill->order}}
                        </td>
                        <td>
                            {{$bill->address}}
                        </td>
                        <td>{{$bill->totalmoney}}</td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{route('updatebill',['id'=>$bill->id])}}" class="text-decoration-none">Sửa</a>
                                <a class="ml-3" href="{{route('deleteBill',['id'=>$bill->id])}}"
                                    class="text-decoration-none">Xóa</a>
                                <a class="ml-3" href="{{route('billdetails',['id'=>$bill->id])}}"
                                    class="text-decoration-none">Details</a>

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