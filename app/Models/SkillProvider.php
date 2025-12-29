<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillProvider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'skill_title',
        'location',
        'category_id',
        'image_url',
        'verified',
        'rating',
        'total_reviews',
        'bio',
        'email',
        'phone',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skills()
    {
        return $this->hasMany(ProviderSkill::class, 'provider_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProviderReview::class, 'provider_id');
    }
}

