<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function Dashboard()
{
    $startOfDay = Carbon::now()->startOfDay();
    $endOfDay = Carbon::now()->endOfDay();

    $countOrderInDay = Order::whereBetween('created_at', [$startOfDay, $endOfDay])
        ->count();

    $totalPriceInDay = OrderDetail::whereBetween('created_at', [$startOfDay, $endOfDay])
        ->sum('price');

    $startOfWeek = Carbon::now()->startOfWeek();
    $endOfWeek = Carbon::now()->endOfWeek();

    $countOrderInWeek = Order::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->count();

    $totalPriceInWeek = OrderDetail::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->sum('price');

    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $countOrderInMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->count();

    $totalPriceInMonth = OrderDetail::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->sum('price');

    return [
        'countOrderInDay' => $countOrderInDay,
        'totalPriceInDay' => $totalPriceInDay,
        'countOrderInWeek' => $countOrderInWeek,
        'totalPriceInWeek' => $totalPriceInWeek,
        'countOrderInMonth' => $countOrderInMonth,
        'totalPriceInMonth' => $totalPriceInMonth,
    ];
}
    public function index()
    {
        $products = Product::all();
        $dashboardData = $this->Dashboard();

        return view('admin.product.index', compact('products', 'dashboardData'));
    }

    public function create()
    {
        $dashboardData = $this->Dashboard();
        return view('admin.product.create',compact('dashboardData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'available' => 'required',
            'category' => 'required|in:bonsai,indoor-plants,outdoor-plants,tools',
            'description' => 'required',
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'available' => $request->input('available'),
            'description' => $request->input('description'),
        ]);

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $dashboardData = $this->Dashboard();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product','dashboardData'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'category' => 'required|in:bonsai,indoor-plants,outdoor-plants,tools',
            'available' => 'required',
            'description' => 'required',
        ]);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->available = $request->input('available');
        $product->description = $request->input('description');


        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

public function destroy($id)
{
    $product = Product::findOrFail($id);

    // Kiểm tra xem sản phẩm có trong bất kỳ đơn hàng nào hay không
    $isProductInOrder = OrderDetail::where('product_id', $product->id)->exists();

    if ($isProductInOrder) {
        return redirect()->route('admin.product.index')->with('error', 'Product is associated with orders and cannot be deleted.');
    }

    // Xóa tất cả hình ảnh liên quan đến sản phẩm
    $product->images()->delete();

    // Sau đó xóa sản phẩm
    $product->delete();

    return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
}



    public function uploadImage(Request $request, $id)
{

    $product = Product::findOrFail($id);


    $request->validate([
        'image' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $imageFile = $request->file('image');


        $cloudinaryUpload = Cloudinary::upload($imageFile->getRealPath());


        $imageUrl = $cloudinaryUpload->getSecurePath();

        $image = new Image();
        $image->name = $imageFile->getClientOriginalName();
        $image->product_id = $product->id;
        $image->url = $imageUrl;
        $image->save();

        return redirect()->route('admin.product.index', $product->id)->with('success', 'Image uploaded successfully.');
    }

    return redirect()->route('admin.product.edit', $product->id)->with('error', 'Failed to upload image.');
}
        public function showUploadImageForm($id)
        {
            // Lấy sản phẩm theo ID để truyền dữ liệu đến view
            $product = Product::findOrFail($id);

            return view('admin.product.uploadImage', compact('product'));
        }
        public function showProductDetail($id)
{
        $product = Product::findOrFail($id);

        return view('admin.product.detail', compact('product'));
}


}
