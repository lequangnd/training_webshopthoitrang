<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index', ['products'=> $products]);
    }

    public function add()
    {
        $categories=Category::all();
        return view('admin.products.add',  ['categories' => $categories]);
    }

    public function addProduct(Request $request)
    {
        $name=$request->input('name');
        $category_id=$request->input('category');
        $trademark=$request->input('trademark');
        $price=$request->input('price');
        $quantity=$request->input('quantity');
        $color=$request->input('color');
        $picture=$request->input('picture');
        $material=$request->input('material');
        $size=$request->input('size');
        $fashion=$request->input('fashion');
        $description=$request->input('description');
        $product=new Product;
        $product->name=$name;
        $product->category_id=$category_id;
        $product->trademark=$trademark;
        $product->price=$price;
        $product->quantity=$quantity;
        $product->color=$color;
        $product->picture=$picture;
        $product->material=$material;
        $product->size=$size;
        $product->fashion=$fashion;
        $product->description=$description;
        $product->save();
        return redirect()->route('product');
    }
}
