<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\Shop;

class BookmarkController extends Controller
{
    public function create(Request $request)
    {
        $bookmark = new Bookmark();
        $user_id = auth()->user()->id;
        $shop_id = $request->input('shop_id');
        $bookmark->create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $user_id = auth()->user()->id;
        $shop_id = $request->input('shop_id');
        $unbookmark = Bookmark::where('shop_id', $shop_id)->where('user_id', $user_id)->first();
        $unbookmark->delete();

        return back();
    }
}
