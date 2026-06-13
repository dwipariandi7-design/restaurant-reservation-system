<?php

namespace App\Http\Controllers\Customer;

use App\Models\Complaint;
use App\Http\Requests\StoreComplaintRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ComplaintController extends Controller
{
    public function index(): View
    {
        $complaints = Complaint::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('customer.complaints.index', compact('complaints'));
    }

    public function create(): View
    {
        return view('customer.complaints.create');
    }

    public function store(StoreComplaintRequest $request): RedirectResponse
    {
        Complaint::create([
            'user_id' => auth()->id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'open',
        ]);

        return redirect()->route('customer.complaints.index')
            ->with('success', 'Complaint submitted successfully');
    }

    public function show(Complaint $complaint): View
    {
        $this->authorize('view', $complaint);
        return view('customer.complaints.show', compact('complaint'));
    }
}
