<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class NpcTrainingForm extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia; // 👈 Add this

    protected $table = 'npc_training_forms';

    protected $fillable = ['name', 'description', 'training_start_date', 'form_end_date'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Auth::check() && !$model->created_by) {
                $model->created_by = Auth::id();
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function trainingFormApplication()
    {
        return $this->hasMany(NpcTrainingFormApplication::class);
    }
}
