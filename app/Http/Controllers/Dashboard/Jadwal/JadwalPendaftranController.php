<?php

namespace App\Http\Controllers\Dashboard\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\JadwalPendaftaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalPendaftranController extends Controller
{
    public function index(Request $request)
    {
        $jadwal = JadwalPendaftaran::get();
        return view('dashboard.pages.jadwal.jadwal', compact('jadwal'));
    }
    public function store(Request $request)
    {
        $spp = JadwalPendaftaran::create([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/jadwal');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $jadwal = JadwalPendaftaran::findOrFail($id);

        // Lakukan proses update
        $jadwal->date_start = $request->date_start;
        $jadwal->date_end = $request->date_end;

        $jadwal->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/jadwal');
    }

    public function destroy($id)
    {
        $jadwal = JadwalPendaftaran::findOrFail($id);
        $jadwal->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/jadwal');
    }
}
