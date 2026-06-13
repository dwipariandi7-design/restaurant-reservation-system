<?php

namespace App\Http\Controllers\CustomerService;

use App\Models\Complaint;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ComplaintController extends Controller
{
    public function index(): View
    {
        $complaints = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('cs.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint): View
    {
        return view('cs.complaints.show', compact('complaint'));
    }

    public function updateStatus(Complaint $complaint, $status): RedirectResponse
    {
        $validStatuses = ['open', 'in_progress', 'resolved', 'closed'];
        
        if (!in_array($status, $validStatuses)) {
            return redirect()->back()->with('error', 'Invalid status');
        }

        $complaint->update(['status' => $status]);
        return redirect()->back()->with('success', 'Complaint status updated');
    }

    public function resolve($request, Complaint $complaint): RedirectResponse
    {
        $validated = $request->validate([
            'resolution' => 'required|string|max:1000',
        ]);

        $complaint->update([
            'status' => 'resolved',
            'resolution' => $validated['resolution'],
        ]);

        return redirect()->back()->with('success', 'Complaint resolved');
    }
}
