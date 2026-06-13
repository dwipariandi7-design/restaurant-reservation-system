<?php

namespace App\Http\Controllers\Customer;

use App\Models\Reservation;
use App\Models\Order;
use App\Models\Review;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $upcomingReservations = Reservation::where('user_id', $user->id)
            ->where('status', 'confirmed')
            ->where('reservation_date', '>=', now())
            ->orderBy('reservation_date')
            ->limit(5)
            ->get();

        $totalReservations = Reservation::where('user_id', $user->id)->count();
        $completedOrders = Order::where('user_id', $user->id)
            ->where('status', 'completed')
            ->count();

        return view('customer.dashboard', [
            'upcomingReservations' => $upcomingReservations,
            'totalReservations' => $totalReservations,
            'completedOrders' => $completedOrders,
        ]);
    }
}
