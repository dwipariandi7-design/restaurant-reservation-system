<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::with('user', 'table')->paginate(15);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation): View
    {
        return view('admin.reservations.show', compact('reservation'));
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

    public function cancel(Reservation $reservation): RedirectResponse
    {
        $reservation->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Reservation cancelled');
    }
}
