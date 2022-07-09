<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',  ['categories' => $categories]);
    }

    public function add()
    {
        
        return view('admin.category.add');
    }

    public function addCategory(Request $request)
    {
        $name=$request->input('name');
        $category=new Category;
        $category->name=$name;
        $category->save();
        return redirect()->route('index');
    }
}