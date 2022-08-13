@extends('admin.layouts.master')
@section('content')

<div class="form-group">
    <label for="exampleInputEmail1">Sản phẩm</label>
    <input type="text" name="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""
        value="{{$billdetails->products_details->name}}" readonly="true">
</div>
<form method="post" action="{{route('updateBillDetails',['id'=>$billdetails->id])}}">
    @csrf
    <div class=" form-group">
        <label for="exampleInputEmail1">Size</label>
        <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$billdetails->size}}">
    </div>

    <div class=" form-group">
        <label for="exampleInputEmail1">Màu</label>
        <input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$billdetails->color}}">
    </div>

    <div class=" form-group">
        <label for="exampleInputEmail1">Số lượng</label>
        <input type="text" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="" value="{{$billdetails->number}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection