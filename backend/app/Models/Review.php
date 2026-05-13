<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'client_id',
        'restaurant_id',
        'note',
        'commentaire',
    ];

    protected $casts = [
        'note' => 'integer',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
