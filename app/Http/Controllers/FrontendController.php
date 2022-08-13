<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function index(Request $request)
    {
        $name = $request->input('keyword', "");
        $males = Product::where('fashion', 0)->where('name', 'like', '%' . $name . '%')->get();
        $females = Product::where('fashion', 1)->where('name', 'like', '%' . $name . '%')->get();
        return view('frontend.index', ['males' => $males, 'females' => $females]);
    }

    public function category($id, Request $request)
    {
        $fashion = $request->get('fashion', null);

        $category = Category::find($id);
        $products = $category->products;
        if ($fashion != null) {
            $products = $category->products()->where('fashion', $fashion)->get();
        }
        return view('frontend.category', ['category' => $category, 'products' => $products]);
    }

    public function details($id)
    {

        $product = Product::find($id);
        return view('frontend.details', ['product' => $product]);
    }
}