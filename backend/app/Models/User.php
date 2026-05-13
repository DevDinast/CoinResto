<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'telephone',
        'role',
        'profile_photo',
        'password',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'password' => 'hashed',
        'role' => UserRole::class,
    ];

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'client_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}