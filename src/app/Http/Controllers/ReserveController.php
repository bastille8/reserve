<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Models\Reserve;
use App\Models\Shop;
use App\Models\User;

class ReserveController extends Controller
{
    public function create(AuthorRequest $request)
    {
        $reserve = new Reserve();
        $user_id = auth()->user()->id;
        $shop_id = $request->input('shop_id');
        $days = $request->input('date');
        $times = $request->input('car_time');
        $numbers = $request->input('number_of_people');
        $reserves = Reserve::where('shop_id', $shop_id)->first();
        dump($reserves);

        if ($reserves == null) {
            $reserve->create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'days' => $days,
                'times' => $times,
                'numbers' => $numbers,
            ]);
        } else {
            $reserve->update([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'days' => $days,
                'times' => $times,
                'numbers' => $numbers,
            ]);
        }

        return view('done');
    }
}
