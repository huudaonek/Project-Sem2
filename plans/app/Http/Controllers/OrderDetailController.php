<?php

namespace App\Http\Controllers;

use App\Jobs\SendThank;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class OrderDetailController extends Controller
{
    public function addToCart(Product $product)
    {
        if (Auth::check()) {
            $cart = Session::get('cart', []);

            $existingProduct = null;

            foreach ($cart as $key => $item) {
                if ($item['product_id'] == $product->id) {
                    $existingProduct = $key;
                    break;
                }
            }

            if ($existingProduct !== null) {
                $cart[$existingProduct]['qty']++;

                if ($product->available <= 0) {
                    return redirect()->route('product.index')->with('error', 'Sản phẩm đã hết hàng.');
                }
            } else {
                $cart[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'qty' => 1,
                    'image_url' => $product->images->count() > 0 ? $product->images[0]->url : asset('path_to_default_image.jpg'),
                ];
            }

            Session::put('cart', $cart);
        }

        return redirect()->route('home');
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        $order = Order::where('user_id', Auth::user()->id)->first();

        return view('user.cart', compact('cart', 'order', 'subtotal'));
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('user.cart.show');
    }

    public function showCheckout()
    {
        $cart = Session::get('cart', []);
        return view('user.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('user.cart.show')->with('error', 'Your cart is empty. Add products to your cart before proceeding to checkout.');
        }

        foreach ($cart as $item) {
            $product = Product::find($item['product_id']);
            if (!$product || $product->available < $item['qty']) {
                return redirect()->route('user.cart.show')->with('error', 'Số lượng sản phẩm không đủ hoặc sản phẩm đã hết hàng. Vui lòng kiểm tra giỏ hàng của bạn lại.');
            }
        }

         $payment = $request->input('payment');
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $orderTotal = 0;
            $order->save();


            foreach ($cart as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['product_id'];
                $orderDetail->qty = $item['qty'];
                $orderDetail->price = $item['price'];
                $orderDetail->payment = $payment;
                $orderDetail->total = $item['price'] * $item['qty'];

                $orderDetail->save();

        if ($orderDetail->payment === "Paypal") {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('user.success'),
                    "cancel_url" => route('user.cancel'),
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $orderDetail->total,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        Session::forget('cart');
                        SendThank::dispatch($order);
                        return redirect()->away($links['href']);
                    }
                }
            }
        }
        Session::forget('cart');
        SendThank::dispatch($order);
        return redirect()->route('user.cart.show');
    }
    $product = Product::find($item['product_id']);
    if ($product) {
        $product->available = intval($product->available);
        $product->available -= $item['qty'];
        $product->save();
    }
}
 public function success(Request $request)
    {
        return view('User.thank');
    }
    public function cancel(Request $request)
    {
        return view('User.thank');
    }

    public function listOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        return view('user.orders', compact('orders'));
    }

    public function showOrderDetails($id)
    {
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id', $id)->get();

        return view('user.order-details', compact('order', 'orderDetails'));
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->route('user.orders.list')->with('error', 'Không tìm thấy đơn hàng.');
        }

        if ($order->status === 'Received') {
            return redirect()->route('user.orders.list')->with('error', 'Không thể xóa đơn hàng đã nhận.');
        }

        OrderDetail::where('order_id', $id)->delete();

        $order->delete();

        return redirect()->route('user.orders.list')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
}
