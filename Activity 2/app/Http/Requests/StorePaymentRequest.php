<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePaymentRequest extends FormRequest
{
    public function rules(): array
    {
        return ['method' => ['required', Rule::in(['cash', 'gcash'])]];
    }
}
