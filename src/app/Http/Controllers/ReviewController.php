<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;


class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $review = new Review();
        $user_id = auth()->user()->id;
        $shop_id = $request->input('shop_id');
        $value = $request->input('value');
        $comment = $request->input('comment');
        $review->create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'value' => $value,
            'comment' => $comment,
        ]);

        return back();
    }
}
