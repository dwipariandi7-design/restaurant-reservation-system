<?php

namespace App\Http\Controllers\Customer;

use App\Models\Reservation;
use App\Models\Table;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    public function index(): View
    {
        $reservations = Reservation::where('user_id', auth()->id())
            ->with('table')
            ->orderBy('reservation_date', 'desc')
            ->paginate(10);

        return view('customer.reservations.index', compact('reservations'));
    }

    public function create(): View
    {
        $tables = Table::where('status', 'available')->get();
        return view('customer.reservations.create', compact('tables'));
    }

    public function store(StoreReservationRequest $request): RedirectResponse
    {
        Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'reservation_date' => $request->reservation_date,
            'guest_count' => $request->guest_count,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.reservations.index')
            ->with('success', 'Reservation created successfully');
    }

    public function show(Reservation $reservation): View
    {
        $this->authorize('view', $reservation);
        return view('customer.reservations.show', compact('reservation'));
    }

    public function cancel(Reservation $reservation): RedirectResponse
    {
        $this->authorize('update', $reservation);
        $reservation->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Reservation cancelled');
    }
}
