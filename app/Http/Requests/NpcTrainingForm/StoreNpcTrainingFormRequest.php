<?php

namespace App\Http\Requests\NpcTrainingForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreNpcTrainingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // allow all for now
    }

    public function rules()
    {
        return [
            'first_name'           => 'required|string|max:255',
            'middle_name'          => 'required|string|max:255',
            'last_name'            => 'required|string|max:255',
            'registration_number'  => 'required|string|max:255',
            'designation'          => 'required|string',
            'gender'               => 'required|string|in:Male,Female,Other',
            'dob'                  => 'required|date',
            'citizenship_number'  => 'required|string',
            'issued_district'      => 'required|string',
            'email'                => 'required|email',
            'contact_number'       => 'required|string',
            'qualification'        => 'required|string',
            'institution_attended' => 'required|string',
            'graduation_year'      => 'required|string',
            'workplace_name'       => 'required|string',
            'workplace_address'    => 'required|string',
            'position'             => 'required|string',
            'employment_type'      => 'required|string|in:Full time,Part time,Volunteer',
            'roles'                => 'required|string',
            'training_reason'      => 'required|string',
            'declaration_date'     => 'required|date',
            'declaration_place'    => 'required|string',
        ];
    }
}
