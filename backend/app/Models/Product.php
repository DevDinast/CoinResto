<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nom',
        'description',
        'prix',
        'photo',
        'disponible',
        'temps_preparation',
    ];


    protected $casts = [
        'prix' => 'float',
        'disponible' => 'boolean',
        'temps_preparation' => 'integer',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
