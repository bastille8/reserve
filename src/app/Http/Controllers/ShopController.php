<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('index', ['shops' => $shops]);
    }

    public function detail($id)
    {
        $shopdetail = Shop::find($id);
        return view('detail', compact('shopdetail'));
    }
}
