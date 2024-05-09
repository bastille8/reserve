<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\Shop;
use App\Models\User;
use App\Models\Genre;
use App\Models\Area;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $allshop = Shop::all();
        $allgenre = Genre::all();
        $allarea = Area::all();

        $shop = $request->input('shop');
        $genre_id = $request->input('genre_id');
        $area_id = $request->input('area_id');
        if ($genre_id == null && $area_id == null && $shop == null) {
            $search = Shop::all();
        } elseif (!$genre_id == null && $area_id == null) {
            $search = Shop::where('genre_id', $genre_id)->get();
        } elseif ($genre_id == null && !$area_id == null) {
            $search = Shop::where('area_id', $area_id)->get();
        } elseif (!$genre_id == null && !$area_id == null) {
            $search = Shop::where('genre_id', $genre_id)->where('area_id', $area_id)->get();
        } elseif (!$shop == null && $genre_id == null && $area_id == null) {
            $search = Shop::where('shop', $shop)->get();
        }

        $user_id = auth()->user()->id;
        $shop_id = $request->input('shop_id');
        $bookmark = Bookmark::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if (!$bookmark == null) {
            $bookmark = true;
        } else {
            $bookmark = false;
        }
        return view('index', compact('bookmark', 'allgenre', 'allarea', 'search'));
    }
    public function main()
    {
        return view('main');
    }

    public function detail($id)
    {
        $user_id = auth()->user()->id;
        $shopdetail = Shop::find($id);
        return view('detail', compact('shopdetail', 'user_id'));
    }
    public function store()
    {
        $allgenre = Genre::all();
        $allarea = Area::all();
        return view('shopedit', compact('allgenre', 'allarea'));
    }
    public function create(AuthorRequest $request)
    {
        $areacreate = new Area();
        $areaname = $request->input('area');
        $area = Area::where('area', $areaname)->first();
        if ($area == null) {
            $areacreate->create([
                'area' => $areaname
            ]);
        }

        $genrecreate = new Genre();
        $genrename = $request->input('genre');
        $genre = Area::where('genre', $genrename)->first();
        if ($genre == null) {
            $genrecreate->create([
                'genre' => $genrename
            ]);
        }

        $shopcreate = new Shop();
        $id = Shop::max('id');
        $shop_id = $id + 1;
        $shopname = $request->input('shop');
        $area = $request->input('area_id');
        $genre = $request->input('genre_id');
        $overview = $request->input('overview');
        $image = $request->input('image');
        $shopcreate->create([
            'shop_id' => $shop_id,
            'shop' => $shopname,
            'area_id' => $area,
            'genre_id' => $genre,
            'overview' => $overview,
            'image' => $image,
        ]);

        return view('index');
    }
}
