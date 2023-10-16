<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
public function index()
{
    $orders = Order::orderByRaw("CASE WHEN status = 'Received' THEN 1 ELSE 0 END, created_at DESC")->paginate(4);
    $products = Product::take(4)->get();
    $users = User::orderBy('id')->paginate(4);
    $contacts = Contact::all();

    $dashboardData = $this->Dashboard();
    return view('admin.dashbroad.index', compact('orders', 'users', 'dashboardData','products','contacts'));
}

 public function show($id)
{
    $order = Order::findOrFail($id);
    $orderDetails = OrderDetail::where('order_id', $id)->get();
    $dashboardData = $this->Dashboard();


    return view('admin.dashbroad.order_detail', compact('order', 'orderDetails','dashboardData'));
}
public function removeUser($id)
{
    try {
        User::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Delete User Successflly !');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Fail');
    }
}

    public function updateStatus($id, Request $request)
{
    $order = Order::findOrFail($id);
    $currentStatus = $order->status;

    $statusOptions = ['Confirm', 'Delivering', 'Received'];
    $nextIndex = array_search($currentStatus, $statusOptions) + 1;

    if ($nextIndex < count($statusOptions)) {
        $newStatus = $statusOptions[$nextIndex];
        $order->status = $newStatus;
        $order->save();

        return redirect()->back()->with('success', 'Order status has been updated to ' . $newStatus . '.');
    } else {
        return redirect()->back()->with('error', 'Unable to update status.');
    }
}
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


    public function order() {
    $orders = Order::orderByRaw("CASE WHEN status = 'Received' THEN 1 ELSE 0 END, created_at DESC")
        ->get();

    $orders_detail = OrderDetail::all();
    $dashboardData = $this->Dashboard();

    return view('admin.dashbroad.order', compact('orders', 'orders_detail','dashboardData'));
}

    public function user() {
        $users = User::all();
        $dashboardData = $this->Dashboard();
        return view('admin.dashbroad.user', compact('users','dashboardData'));
    }

}
