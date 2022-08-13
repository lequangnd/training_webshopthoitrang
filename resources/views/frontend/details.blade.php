@extends('frontend.layouts.master')
@section('content')
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('images/'.$product->picture)}}" alt="Image">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4">{{$product->price}}</h3>
            <p class="mb-4">{{$product->material}}</p>
            <form method="post" action="{{route('save_cart')}}">
                @csrf
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>


                    <?php $size = explode(',', $product->size); ?>
                    @foreach($size as $s)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input @error('size') is-invalid @enderror"
                            id="size-{{$loop->index}}" name="size" value="{{$s}}">
                        <label class="custom-control-label" for="size-{{$loop->index}}">{{$s}}</label>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>

                    <?php $color = explode(',', $product->color) ?>
                    @foreach($color as $c)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input @error('color') is-invalid @enderror"
                            id="color-{{$loop->index}}" name="color" value="{{$c}}">
                        <label class="custom-control-label" for="color-{{$loop->index}}">{{$c}}</label>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <input type="text" name="quantity" class="form-control bg-secondary text-center" value="1">
                    </div>
                    <input name="productid_hidden" type="hidden" class="form-control bg-secondary text-center"
                        value="{{$product->id}}">
                    <button type="submit" class="btn btn-primary px-3 addToCart"><i
                            class="fa fa-shopping-cart mr-1"></i> Add To
                        Cart</button>
                </div>
            </form>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>

            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Product Description</h4>

                    <p>{{$product->description}}</p>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->
@endsection