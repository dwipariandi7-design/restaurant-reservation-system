<?php

namespace App\Http\Controllers\Customer;

use App\Models\Review;
use App\Models\Reservation;
use App\Http\Requests\StoreReviewRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::where('user_id', auth()->id())
            ->with('reservation')
            ->paginate(10);

        return view('customer.reviews.index', compact('reviews'));
    }

    public function create(Reservation $reservation): View
    {
        $this->authorize('view', $reservation);
        return view('customer.reviews.create', compact('reservation'));
    }

    public function store(StoreReviewRequest $request): RedirectResponse
    {
        $reservation = Reservation::find($request->reservation_id);
        $this->authorize('view', $reservation);

        Review::create([
            'user_id' => auth()->id(),
            'reservation_id' => $request->reservation_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('customer.reviews.index')
            ->with('success', 'Review submitted successfully');
    }
}
