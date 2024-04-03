<?php

namespace App\Http\Controllers\Siswa\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.siswa.home.home');
    }
}
