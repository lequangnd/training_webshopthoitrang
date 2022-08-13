<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Bill;
use App\Models\Category;
use App\Models\Details;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Session\Session;

session_start();

class ShoppingCartController extends Controller
{

    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }
    public function cart()
    {
        return view('frontend.cart');
    }

    public function save_cart(Request $request)
    {
        $request->validate(['size' => 'required', 'color' => 'required']);

        $productid = $request->input('productid_hidden');
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');
        $product_info = Product::where('id', $productid)->first();
        $data['id'] = $product_info->id;
        $data['name'] = $product_info->name;
        $data['quantity'] = $quantity;
        $data['price'] = $product_info->price;
        $data['image'] = $product_info->picture;
        $data['size'] = $size;
        $data['color'] = $color;
        Cart::add($data);
        //Cart::clear();
        return redirect()->route('cart');
    }

    public function deleteItemCart($id)
    {
        Cart::remove($id);
        return redirect()->route('cart');
    }

    public function updatecart(Request $request, $id)
    {
        $quantity = $request->input('quantity_cart');
        Cart::update($id, $quantity);
        return redirect()->route('cart');
    }

    public function order(StoreOrderRequest $request)
    {
        $content = Cart::getcontent();
        $data['users_id'] = Auth::user()->id;
        $data['order'] = Carbon::today();
        $data['address'] = $request->input('address');
        $data['totalmoney'] = Cart::getsubtotal();
        $bill = Bill::insertGetId($data);
        $data_details['bill_id'] = $bill;
        foreach ($content as $c) {
            $data_details['product_id'] = $c->id;
            $data_details['number'] = $c->quantity;
            $data_details['size'] = $c->size;
            $data_details['color'] = $c->color;
            Details::insert($data_details);
        }
        Cart::clear();

        return redirect()->route('index');
    }
}