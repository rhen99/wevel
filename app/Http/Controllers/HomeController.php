<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function home()
    {
        $novels = auth()->user()->novels()->get();
        return view("auth.home")->with("novels", $novels);
    }
}
