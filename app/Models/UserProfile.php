<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'registration_number', 'designation', 'gender', 'dob', 'citizenship_number', 'issued_district', 'email', 'contact_number', 'qualification', 'institution_attended', 'graduation_year', 'workplace_name', 'workplace_address', 'position', 'employment_type', 'roles', 'training_reason', 'declaration_date', 'declaration_place', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
