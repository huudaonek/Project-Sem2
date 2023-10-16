<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.product.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.product.detail', compact('product'));
    }
public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->get();

        return view('User.product.search', compact('products'));
    }

public function getBonsai()
    {
        $products = Product::where('category', 'bonsai')->get();

        return view('User.category.bonsai', compact('products'));
    }

    public function getIndoorPlants()
    {
        $products = Product::where('category', 'indoor-plants')->get();

        return view('User.category.indoor-plants', compact('products'));
    }

    public function getOutdoorPlants()
    {
        $products = Product::where('category', 'outdoor-plants')->get();

        return view('User.category.outdoor-plants', compact('products'));
    }

    public function getTools()
    {
        $products = Product::where('category', 'tools')->get();

        return view('User.category.tools', compact('products'));
    }
    public function filterByPrice(Request $request)
{
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

    return view('user.product.filtered', compact('products'));
}
public function filterByPriceLowToHigh()
{
    $products = Product::orderBy('price', 'asc')->get();

    return view('user.product.filtered', compact('products'));
}
public function filterByPriceHighToLow()
{
    $products = Product::orderBy('price', 'desc')->get();

    return view('user.product.filtered', compact('products'));
}

}
