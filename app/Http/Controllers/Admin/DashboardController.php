<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Order;
use App\Models\Review;
use Illuminate\View\View;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalCustomers = User::whereHas('roles', function($q) {
            $q->where('name', 'customer');
        })->count();

        $totalReservations = Reservation::count();
        $todayReservations = Reservation::whereDate('reservation_date', Carbon::today())->count();
        $monthReservations = Reservation::whereMonth('reservation_date', Carbon::now()->month)
            ->whereYear('reservation_date', Carbon::now()->year)->count();

        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');

        // Monthly reservations data
        $monthlyReservations = Reservation::selectRaw('MONTH(reservation_date) as month, COUNT(*) as count')
            ->whereYear('reservation_date', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Monthly revenue data
        $monthlyRevenue = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->where('status', 'completed')
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return view('admin.dashboard', [
            'totalCustomers' => $totalCustomers,
            'totalReservations' => $totalReservations,
            'todayReservations' => $todayReservations,
            'monthReservations' => $monthReservations,
            'totalRevenue' => $totalRevenue,
            'monthlyReservations' => $monthlyReservations,
            'monthlyRevenue' => $monthlyRevenue,
        ]);
    }
}
