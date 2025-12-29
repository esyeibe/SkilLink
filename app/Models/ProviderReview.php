<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProviderReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function provider()
    {
        return $this->belongsTo(SkillProvider::class, 'provider_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateRating()
    {
        $this->rating = $this->reviews()->avg('rating') ?? 0;
        $this->save();
    }

}
