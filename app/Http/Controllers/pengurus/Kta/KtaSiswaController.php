<?php

namespace App\Http\Controllers\pengurus\Kta;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Kota;
use App\Models\Pembayaran;
use App\Models\Profile;
use App\Models\Provinsi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KtaSiswaController extends Controller
{
    public function index(Request $request)
    {
        $dataProfile =  Profile::where('user_id', Auth::user()->id)->first();
        $dataForm = Form::where('user_id', Auth::user()->id)->first();
        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();
        $provinces = Provinsi::get();
        return view('dashboard.pages.pengurus.kta.index', compact('dataProfile', 'dataForm', 'pembayaran', 'provinces'));
    }

    public function getCities($province_id)
    {
        $cities = Kota::where('province_id', $province_id)->get();
        return response()->json($cities);
    }

    public function cetakKTP()
    {
        $dataProfile =  Profile::where('user_id', Auth::user()->id)->first();
        // $dataForm = Form::get();
        $dataForm = Form::where('user_id', Auth::user()->id)->first();
        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();

        return view('dashboard.pages.pengurus.kta.cetak-pdf', compact('dataProfile', 'dataForm', 'pembayaran'));
    }

    public function cetakKTPPengurus($id)
    {
        $dataProfile =  Profile::where('user_id', $id)->first();
        // $dataForm = Form::get();
        $dataForm = Form::where('user_id', $id)->first();
        $pembayaran = Pembayaran::where('user_id', $id)->first();

        return view('dashboard.pages.pendaftaran.cetakPengurus-pdf', compact('dataProfile', 'dataForm', 'pembayaran'));
    }

    public function cetakAllKTP()
    {
        $pembayaran = Pembayaran::join('users', 'pembayarans.user_id', '=', 'users.id')
            ->where('users.role', 'pengurus')
            ->where('pembayarans.status', 'Paid')
            ->orderBy('pembayarans.created_at', 'DESC')
            ->with('user.form')
            ->get(['pembayarans.*']);
        if ($pembayaran->isEmpty()) {
            toast('Tidak Ada Data Status Pembayaran Paid!!!', 'warning');
            return view('dashboard.pages.pendaftaran.cetakallpengurus-pdf', compact('pembayaran'));
        }
        return view('dashboard.pages.pendaftaran.cetakallpengurus-pdf', compact('pembayaran'));
    }

    public function cetakPDF()
    {
        $dataProfile =  Profile::where('user_id', Auth::user()->id)->first();
        $dataForm = Form::where('user_id', Auth::user()->id)->first();
        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();

        $pdf = Pdf::loadView('dashboard.pages.pengurus.kta.cetak-pdf', compact('dataProfile', 'dataForm', 'pembayaran'));
        return $pdf->download('kta.pdf');
    }
}
