<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'table_id' => 'required|exists:tables,id',
            'reservation_date' => 'required|date|after:now',
            'guest_count' => 'required|integer|min:1|max:20',
            'notes' => 'nullable|string|max:500',
        ];
    }
}
