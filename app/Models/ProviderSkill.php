<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProviderSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id',
        'name',
        'experience',
        'description',
    ];

    public function provider()
    {
        return $this->belongsTo(SkillProvider::class, 'provider_id');
    }
}
