<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserve;
use App\Models\Area;
use App\Models\Genre;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'shop',
        'shop_id',
        'area_id',
        'genre_id',
        'overview',
        'image',
    ];

    public function down()
    {
        Schema::dropIfExists('shops');
    }

    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
    public function genres()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function reserves()
    {
        return $this->hasMany(Reserve::class, 'shop_id', 'shop');
    }
}
