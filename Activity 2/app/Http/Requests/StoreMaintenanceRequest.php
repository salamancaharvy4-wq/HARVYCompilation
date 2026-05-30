<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequest extends FormRequest
{
    public function rules(): array
    {
        return ['machine_id' => ['required', 'exists:machines,id'], 'issue' => ['required', 'string', 'max:1000']];
    }
}
