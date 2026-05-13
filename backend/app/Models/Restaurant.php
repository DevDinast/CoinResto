<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Enums\RestaurantStatus;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'logo',
        'address',
        'longitude',
        'latitude',
        'telephone',
        'horaires',
        'average_rating',
        'status',
        'subscription_plan',
        'commission_rate',
    ];

    protected $casts = [
        'horaires' => 'array',
        'status' => RestaurantStatus::class,
        'average_rating' => 'float',
        'commission_rate' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}