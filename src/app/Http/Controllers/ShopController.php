<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $shops = Shop::all();
        $genres = Genre::all();
        $areas = Area::all();
        $shop = $request->input('shop');
        $genre = $request->input('genre');
        $area = $request->input('area');
        $search = Shop::where('genre_id', $genre)->where('area_id', $area)->where('shop', $shop)->get();


        $user_id = auth()->user()->id;
        $shop_id = Shop::select('shop_id')->get();
        $bookmark = Bookmark::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        dump($shop_id);
        dump($bookmark);
        if (!$bookmark == null) {
            $bookmark = true;
        } else {
            $bookmark = false;
        }
        return view('index', compact('shops', 'bookmark', 'genres', 'areas', 'search'));
    }

    public function detail($id)
    {
        $shopdetail = Shop::find($id);
        return view('detail', compact('shopdetail'));
    }
}
