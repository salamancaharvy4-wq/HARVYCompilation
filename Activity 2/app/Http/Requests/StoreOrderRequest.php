<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'items' => ['required', 'array', 'min:1'],
            'items.*.item_name' => ['required', 'string', 'max:120'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
            'items.*.weight_kg' => ['required', 'numeric', 'min:0.1', 'max:100'],
        ];
    }
}
