<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignMachineRequest extends FormRequest
{
    public function rules(): array
    {
        return ['order_id' => ['required', 'exists:orders,id'], 'machine_id' => ['required', 'exists:machines,id']];
    }
}
