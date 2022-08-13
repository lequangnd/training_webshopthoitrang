@extends('admin.layouts.master')
@section('content')
<form method="post" action="{{route('updateBill',['id'=>$bill->id])}}">
    @csrf
    <label for="cars">Tên khách hàng</label>
    <select name="user_id" id="cars">
        @foreach($users as $user)
        <option value="{{$user->id}}" @if($user->id==$bill->users_id) selected @endif >{{$user->name}}
        </option>
        @endforeach
    </select>

    <div class="form-group">
        <label for="exampleInputEmail1">Ngày đặt</label>
        <input type="text" name="order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$bill->order}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Địa chỉ</label>
        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$bill->address}}">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tổng tiền</label>
        <input type="text" name="totalmoney" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$bill->totalmoney}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection