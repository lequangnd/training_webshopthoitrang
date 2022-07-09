@extends('admin.layouts.master')
@section('content')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            
                                            <th>name</th>
                                            <th><a href="{{route('add.category')}}"><button class="btn btn-primary">Add Category</button></a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category )
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            
                                            <td>{{$category->name}}</td>
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