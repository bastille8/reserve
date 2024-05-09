<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'genre',
    ];

    public function genre()
    {
        return $this->hasMany(Shop::class, 'genre_id', 'genre');
    }
}
