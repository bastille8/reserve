<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'area',
    ];

    public function area()
    {
        return $this->hasMany(Shop::class, 'area_id', 'area');
    }
}
