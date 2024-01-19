<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'local_currency_cost' => 'integer',
            'local_currency_price' => 'integer',
            'credits_price' => 'integer',
            'employee_id' => 'exists:employees,id',
            'variation_id' => 'exists:variations,id',
            'gift_card_id' => 'exists:gift_cards,id',
        ];
    }
}
