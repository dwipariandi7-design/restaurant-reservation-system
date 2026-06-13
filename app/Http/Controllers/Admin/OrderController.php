<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user', 'orderDetails')->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load('orderDetails.menu');
        return view('admin.orders.show', compact('order'));
    }
}
