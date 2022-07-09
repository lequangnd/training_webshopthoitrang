@extends('admin.layouts.master')
@section('content')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>

                                            <th>Tên sản phẩm</th>
                                            <th>Loại</th>
                                            <th>Ảnh</th>
                                            <th>Màu</th>
                                            <th>Size</th>
                                            <th>Giá</th>
                                            <th><a href="{{route('add.product')}}"><button class="btn btn-primary">Add Product</button></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            
                                            <td>{{$product->name}}</td>
                                            <td>
                                                {{$product->category->name}}
                                            </td>
                                            <td > <img style="width:100px; height:100px;" src="{{asset('images/'.$product->picture)}}" alt=""></td>
                                            <td>{{$product->color}}</td>
                                            <td>
                                            {{$product->size}}
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
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