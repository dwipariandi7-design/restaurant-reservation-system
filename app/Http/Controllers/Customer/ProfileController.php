<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $user = auth()->user();
        return view('customer.profile.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $user->update($request->validated());

        return redirect()->route('customer.profile.edit')
            ->with('success', 'Profile updated successfully');
    }
}
