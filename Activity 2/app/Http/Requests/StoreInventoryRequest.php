<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'stock' => ['required', 'numeric', 'min:0'],
            'unit' => ['required', 'string', 'max:20'],
            'low_stock_threshold' => ['required', 'numeric', 'min:0'],
        ];
    }
}
