<?php

namespace App\Http\Controllers\pengurus\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.pengurus.home.home');
    }
}
