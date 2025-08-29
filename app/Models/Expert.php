<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Expert extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'name_of_expert',
        'qualification',
        'affiliation',
        'key_expertise',
        'experience',
        'trainings_attended',
        'trainings_delivered',
        'training_materials',
        'availability',
        'expected_compensation',
        'letter_of_motivation',
        'preferred_area_of_engagement',
    ];

    protected $casts = [
        'training_materials' => 'array',
        'availability' => 'boolean',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
