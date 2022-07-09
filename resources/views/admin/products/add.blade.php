@extends('admin.layouts.master')
@section('content')
<form method="post" action="{{route('addproduct')}}">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Tên sản phẩm</label>
    <input type="text" name="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <label for="cars">Loại</label>

<select name="category" id="cars">
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>

  <div class="form-group">
    <label for="exampleInputEmail1">Tên thương hiệu</label>
    <input type="text" name="trademark" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Giá</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Số lượng</label>
    <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Ảnh</label>
    <input type="file" name="picture" accept="image/*"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Màu</label>
    <input type="text" name="color" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Size</label>
    <input type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Chất liệu</label>
    <input type="text" name="material" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <select name="fashion" id="cars">
  <option value="0">Nam</option>
  <option value="1">Nữ</option>
</select>

  <div class="form-group">
    <label for="exampleInputEmail1">Mô tả</label>
    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection