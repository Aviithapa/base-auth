<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class NpcTrainingFormApplication extends Model
{

    use SoftDeletes;

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'registration_number', 'designation', 'gender', 'dob', 'citizenship_number', 'issued_district', 'email', 'contact_number', 'qualification', 'institution_attended', 'graduation_year', 'workplace_name', 'workplace_address', 'position', 'employment_type', 'roles', 'training_reason', 'declaration_date', 'declaration_place', 'npc_training_form_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check() && !$model->user_id) {
                $model->user_id = Auth::id();
            }
        });
    }
}
