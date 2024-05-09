<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;

class AuthController extends Controller
{
    public function show()
    {
        $user_id = auth()->user()->id;
        $reserve = Reserve::where('user_id', $user_id)->get();
        $bookmark = Bookmark::where('user_id', $user_id)->get();
        return view('mypage', compact('reserve', 'bookmark'));
    }
    
}
