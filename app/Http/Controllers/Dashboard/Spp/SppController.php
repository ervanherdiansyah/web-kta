<?php

namespace App\Http\Controllers\Dashboard\Spp;

use App\Http\Controllers\Controller;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    public function index(Request $request)
    {
        $sppSiswa = Spp::get();
        // Mengambil data pembayaran SPP
        $tahun = $request->tahun ?? date('Y');
        $spp = DB::table('spps')
            ->select('nama', 'bulan')
            ->whereYear('tanggal_pembayaran', $tahun)
            ->orderBy('nama')
            ->get()
            ->groupBy('nama');

        // $bulan = DB::table('spps')->distinct()->pluck('bulan');
        $bulan = [
            'Januari', 'Februari', 'Maret', 'April',
            'Mei', 'Juni', 'Juli', 'Agustus',
            'September', 'Oktober', 'November', 'Desember'
        ];

        return view('dashboard.pages.data.spp.spp', compact('spp', 'bulan', 'sppSiswa', 'tahun'));
    }
    public function store(Request $request)
    {
        $spp = Spp::create([
            'nama' => $request->nama,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/spp');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $spp = Spp::findOrFail($id);

        // Lakukan proses update
        $spp->nama = $request->nama;
        $spp->bulan = $request->bulan;
        $spp->tahun = $request->tahun;
        $spp->jumlah_pembayaran = $request->jumlah_pembayaran;
        $spp->tanggal_pembayaran = $request->tanggal_pembayaran;

        $spp->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/spp');
    }

    public function destroy($id)
    {
        $pendaftaran = Spp::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/spp');
    }
}
