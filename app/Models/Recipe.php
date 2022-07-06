<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'servings',
        'quantity',
        'energy',
        'slug'
    ];

    public function nutrition()
    {
        return $this->hasOne(Nutrition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
