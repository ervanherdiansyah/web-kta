<?php

namespace App\Http\Controllers\Siswa\Kta;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KtaSiswaController extends Controller
{
    public function index()
    {
        $dataProfile =  Profile::where('user_id', Auth::user()->id)->first();
        $dataForm = Form::where('user_id', Auth::user()->id)->first();
        return view('dashboard.pages.siswa.kta.index', compact('dataProfile', 'dataForm'));
    }
}
