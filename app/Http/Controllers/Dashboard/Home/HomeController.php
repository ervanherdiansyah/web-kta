<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\Data\Guru;
use App\Models\Data\Siswa;
use App\Models\Form;
use App\Models\Pendaftaran\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Data Chart Line
        $pendaftaranPerTahun = Form::selectRaw('YEAR(created_at) as tahun, COUNT(*) as total_pendaftaran')
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();
        // dd($pendaftaranPerTahun);

        $labels = $pendaftaranPerTahun->pluck('tahun');
        $data = $pendaftaranPerTahun->pluck('total_pendaftaran');

        //Data Chart Pie
        // $jumlahDiterima = Pendaftaran::where('status_pendaftaran', 'Terverifikasi')->count();
        // $jumlahDitolak = Pendaftaran::where('status_pendaftaran', 'Ditolak')->count();
        // $dataChart = [$jumlahDiterima, $jumlahDitolak];
        // $labelsChart = ['Diterima', 'Ditolak'];

        // Data
        $totalPeserta = DB::table('forms')
            ->join('users', 'forms.user_id', '=', 'users.id')
            ->where('users.role', 'user')
            ->count();
        $totalPengurus = DB::table('forms')
            ->join('users', 'forms.user_id', '=', 'users.id')
            ->where('users.role', 'pengurus')
            ->count();

        // return view('dashboard.pages.home.home', compact('labels', 'data', 'dataChart', 'labelsChart', 'totalPendaftaran', 'totalSiswa', 'totalGuru'));
        return view('dashboard.pages.home.home', compact('totalPeserta', 'totalPengurus', 'labels', 'data'));
    }
}
