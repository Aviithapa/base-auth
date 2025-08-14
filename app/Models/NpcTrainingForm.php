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

     public function latestApplication() {
        return $this->trainingFormApplication()
                    ->where('user_id', Auth::id()) // filter by current user
                    ->latest()
                    ->first();
    }


    public function isRejected() {
        $app = $this->latestApplication();
        return $app && $app->status === 'rejected';
    }

    public function isApproved() {
        $app = $this->latestApplication();
        return $app && $app->status === 'approved';
    }

    public function isPending() {
        $app = $this->latestApplication();
        return $app && $app->status === 'pending';
    }

    public function remarks() {
        $app = $this->latestApplication();
        return $app ? $app->remarks : null;
    }
}
