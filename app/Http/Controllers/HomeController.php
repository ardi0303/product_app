<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index(){
        if(Auth::id()){
            $usertype=Auth()->user()->usertype;
            if($usertype=='user'){
                return redirect()->route('dashboard');
            }
            else if($usertype=='admin'){
                return redirect()->route('dashboards');
            }
        }
    }
}
