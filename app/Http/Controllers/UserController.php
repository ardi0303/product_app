<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function dashboard(){
        $data = Product::where('stock', '>', 0)->get();
        return view('user.dashboard', compact('data'));
    }
}
