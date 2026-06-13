<?php

namespace App\Http\Controllers\CustomerService;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with('user', 'orderDetails.menu')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('cs.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load('user', 'orderDetails.menu', 'reservation');
        return view('cs.orders.show', compact('order'));
    }

    public function updateStatus(Order $order, $status): RedirectResponse
    {
        $validStatuses = ['pending', 'processing', 'completed', 'delivered', 'cancelled'];
        
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status');
        }

        $order->update(['status' => $status]);
        return redirect()->back()->with('success', 'Order status updated');
    }
}
