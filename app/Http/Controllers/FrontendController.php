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
        $categories=Category::all();
        View::share('categories',$categories);
    }

    public function index()
    {
       $males=Product::where('fashion',0)->get();
       $females=Product::where('fashion',1)->get();
        return view('frontend.index', ['males' => $males, 'females' => $females]);
    }

    public function category($id, Request $request)
    {
        $fashion = $request->get('fashion', null);

        $category=Category::find($id);
        $products=$category->products;
        if ($fashion != null) {
            $products=$category->products()->where('fashion', $fashion)->get();
        }
        return view('frontend.category', ['category' => $category, 'products' => $products]);
    }
}
