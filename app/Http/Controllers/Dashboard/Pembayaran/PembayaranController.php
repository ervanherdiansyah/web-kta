<?php

namespace App\Http\Controllers\Dashboard\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::get();

        return view('dashboard.pages.data.pembayaran.pembayaran', compact('pembayaran'));
    }
    public function store(Request $request)
    {
        $pembayaran = Pembayaran::create([
            'user_id' => $request->user_id,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'tanggal_pembayaran' => now(),
            'status' => $request->status,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/pembayaran');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $pembayaran = Pembayaran::findOrFail($id);

        // Lakukan proses update
        $pembayaran->user_id = $request->user_id;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->status = $request->status;

        $pembayaran->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/pembayaran');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/pembayaran');
    }
}
