@extends('frontend.layouts.master')
@section('content')
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <?php

                use Gloudemans\Shoppingcart\Facades\Cart;

                $content = Cart::getcontent();


                ?>
                <tbody class="align-middle">
                    @foreach($content as $c)
                    <tr>
                        <td class="align-middle"><img src="{{asset('images/'.$c->image)}}" alt="" style="width: 50px;">
                        </td>
                        <td class="align-middle">{{$c->name}}</td>
                        <td class="align-middle">{{$c->size}}</td>
                        <td class="align-middle">{{$c->color}}</td>
                        <td class="align-middle">{{$c->price}}</td>
                        <td class="align-middle">
                            <form method="post" action="{{route('updatecart',['id'=>$c->id])}}">
                                @csrf
                                <div class="input-group quantity mx-auto" style="width: 100px;">

                                    <input type="text" name="quantity_cart[]"
                                        class="form-control form-control-sm bg-secondary text-center "
                                        value="{{$c->quantity}}">
                                </div>
                                <button class="btn btn-sm btn-primary mt-1" type="submit" value="update">update</button>
                            </form>

                        </td>
                        <td class="align-middle">
                            <?php
                            $subtotal = $c->price * $c->quantity;
                            echo $subtotal;
                            ?>
                        </td>
                        <td class="align-middle"><button class="btn btn-sm btn-primary"> <a
                                    href="{{route('deleteItemCart', ['id'=> $c->id])}}" class="text-dark"><i
                                        class="fa fa-times"></i></a>
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>

                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">{{Cart::getsubtotal()}}</h5>
                    </div>
                    @if(Auth::check())
                    <form action="{{route('order')}}" method="post">
                        @csrf
                        <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ giao hàng"
                            class="form-control form-control-sm bg-secondary text-center @error('address') is-invalid @enderror">
                        <button type="submit" class="btn btn-block btn-primary my-3 py-3">Thanh
                            toán</button>
                    </form>
                    @else
                    <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ giao hàng"
                        class="form-control form-control-sm bg-secondary text-center @error('address') is-invalid @enderror">
                    <button class="btn btn-block btn-primary my-3 py-3"><a href="{{route('login')}}"
                            class="text-dark text-decoration-none">Thanh
                            toán</a></button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection