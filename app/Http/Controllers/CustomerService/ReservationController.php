<?php

namespace App\Http\Controllers\CustomerService;

use App\Models\Reservation;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::with('user', 'table')
            ->orderBy('reservation_date', 'desc')
            ->paginate(15);

        return view('cs.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation): View
    {
        $reservation->load('user', 'table', 'orders.orderDetails.menu');
        return view('cs.reservations.show', compact('reservation'));
    }

    public function confirm(Reservation $reservation): RedirectResponse
    {
        $reservation->update(['status' => 'confirmed']);
        return redirect()->back()->with('success', 'Reservation confirmed');
    }

    public function reject(Reservation $reservation): RedirectResponse
    {
        $reservation->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Reservation rejected');
    }

    public function checkIn(Reservation $reservation): RedirectResponse
    {
        $reservation->update(['status' => 'completed']);
        $reservation->table()->update(['status' => 'occupied']);
        return redirect()->back()->with('success', 'Guest checked in');
    }
}
