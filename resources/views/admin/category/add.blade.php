@extends('admin.layouts.master')
@section('content')
<form method="post" action="{{route('addcategory')}}">
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Tên loại</label>
    <input type="text" name="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection