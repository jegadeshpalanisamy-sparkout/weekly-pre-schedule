<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeekRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'week_name' => 'required|string|max:255',
            'from_date' => 'required|date|before_or_equal:to_date',
            'to_date' => 'required|date|after_or_equal:from_date',
        ];
    }


    public function messages()
    {
        return [
            'week_name.required' => 'The week name is required.',
            'from_date.required' => 'The start date is required.',
            'to_date.required' => 'The end date is required.',
            'from_date.before_or_equal' => 'The start date must be before or equal to the end date.',
            'to_date.after_or_equal' => 'The end date must be after or equal to the start date.',
        ];
    }
}
