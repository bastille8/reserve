<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shop;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'shop_id',
    ];

    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shops()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
