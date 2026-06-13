<?php

namespace App\Http\Controllers\Customer;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('orderDetails.menu')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    public function create(): View
    {
        $menus = Menu::where('is_available', true)->with('category')->get();
        return view('customer.orders.create', compact('menus'));
    }

    public function store(StoreOrderRequest $request): RedirectResponse
    {
        $totalAmount = 0;
        $items = $request->items;

        // Calculate total
        foreach ($items as $item) {
            $menu = Menu::find($item['menu_id']);
            $totalAmount += $menu->price * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'reservation_id' => $request->reservation_id,
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'notes' => $request->notes,
        ]);

        // Create order details
        foreach ($items as $item) {
            $menu = Menu::find($item['menu_id']);
            OrderDetail::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $menu->price,
            ]);
        }

        return redirect()->route('customer.orders.index')
            ->with('success', 'Order created successfully');
    }

    public function show(Order $order): View
    {
        $this->authorize('view', $order);
        $order->load('orderDetails.menu');
        return view('customer.orders.show', compact('order'));
    }
}
