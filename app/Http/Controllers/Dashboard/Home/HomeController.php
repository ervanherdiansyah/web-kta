<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Models\Data\Guru;
use App\Models\Data\Siswa;
use App\Models\Pendaftaran\Pendaftaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //Data Chart Line
        // $pendaftaranPerTahun = Pendaftaran::selectRaw('YEAR(tgl_pendaftaran) as tahun, COUNT(*) as total_pendaftaran')
        //     ->groupBy('tahun')
        //     ->orderBy('tahun')
        //     ->get();

        // $labels = $pendaftaranPerTahun->pluck('tahun');
        // $data = $pendaftaranPerTahun->pluck('total_pendaftaran');

        //Data Chart Pie
        // $jumlahDiterima = Pendaftaran::where('status_pendaftaran', 'Terverifikasi')->count();
        // $jumlahDitolak = Pendaftaran::where('status_pendaftaran', 'Ditolak')->count();
        // $dataChart = [$jumlahDiterima, $jumlahDitolak];
        // $labelsChart = ['Diterima', 'Ditolak'];

        //Data
        // $totalPendaftaran = Pendaftaran::count();
        // $totalSiswa = Siswa::count();
        // $totalGuru = Guru::count();

        // return view('dashboard.pages.home.home', compact('labels', 'data', 'dataChart', 'labelsChart', 'totalPendaftaran', 'totalSiswa', 'totalGuru'));
        return view('dashboard.pages.home.home');
    }
}
