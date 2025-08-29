<?php

namespace App\Http\Requests\Expert;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpertRequest extends FormRequest
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
            'name_of_expert' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'key_expertise' => 'nullable|string',
            'experience' => 'nullable|integer|min:0',
            'trainings_attended' => 'nullable|string',
            'trainings_delivered' => 'nullable|string',
            'training_materials' => 'nullable|array',
            'training_materials.*' => 'string', // file paths or URLs
            'availability' => 'required|boolean',
            'expected_compensation' => 'nullable|string|max:255',
            'letter_of_motivation' => 'nullable|string',
            'preferred_area_of_engagement' => 'nullable|string|max:255',
        ];
    }
}
