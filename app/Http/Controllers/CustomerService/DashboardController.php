<?php

namespace App\Http\Controllers\CustomerService;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $todayReservations = Reservation::whereDate('reservation_date', Carbon::today())
            ->where('status', 'confirmed')
            ->count();

        $pendingReservations = Reservation::where('status', 'pending')->count();
        $totalReservations = Reservation::count();

        $upcomingReservations = Reservation::where('status', 'confirmed')
            ->where('reservation_date', '>=', now())
            ->orderBy('reservation_date')
            ->limit(10)
            ->get();

        return view('cs.dashboard', [
            'todayReservations' => $todayReservations,
            'pendingReservations' => $pendingReservations,
            'totalReservations' => $totalReservations,
            'upcomingReservations' => $upcomingReservations,
        ]);
    }
}
