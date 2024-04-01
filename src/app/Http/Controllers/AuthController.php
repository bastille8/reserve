<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;

class AuthController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id;
        $reserve = Reserve::where('user_id', $user_id)->get();
        return view('mypage', ['reserve' => $reserve]);
    }
}
