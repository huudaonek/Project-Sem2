<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home()
    {
        $products = Product::all();

    return view('admin.home', ['products' => $products]);

    }
}
