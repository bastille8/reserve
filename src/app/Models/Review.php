<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shop;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
        'value',
        'comment',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
