<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function reservations(): View
    {
        $reservations = Reservation::with('user', 'table')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])
            ->get();

        return view('admin.reports.reservations', compact('reservations'));
    }

    public function revenue(): View
    {
        $orders = Order::with('user')
            ->where('status', 'completed')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])
            ->get();

        $totalRevenue = $orders->sum('total_amount');

        return view('admin.reports.revenue', compact('orders', 'totalRevenue'));
    }
}
