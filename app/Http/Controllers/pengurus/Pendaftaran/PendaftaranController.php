<?php

namespace App\Http\Controllers\pengurus\Pendaftaran;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSmile;
use App\Models\Pendaftaran\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $pendaftaran = Pendaftaran::where('user_id', $user)->first();
        return view('dashboard.pages.pengurus.pendaftaran.index', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nik' => 'required|string|max:16',
            'no_kk' => 'required|string|max:16',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_pendamping' => 'required|string|max:255',
            'no_pendamping' => 'required|string|max:15',
            'jurusan1' => 'required|string|max:255',
            'jurusan2' => 'required|string|max:255',
            'kta' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file PDF dengan ukuran maksimal 2MB
        ]);
        $file_name = null;
        if ($request->hasFile('kta')) {
            $file_name = $request->kta->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->kta->storeAs('public/kta', $namaGambar);
        }

        $pendaftaran = Pendaftaran::create([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,
            'hp' => $request->hp,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'alamat' => $request->alamat,
            'nama_pendamping' => $request->nama_pendamping,
            'no_pendamping' => $request->no_pendamping,
            'jurusan1' => $request->jurusan1,
            'jurusan2' => $request->jurusan2,
            'kta' => $file_name ? 'kta/' . $namaGambar : null,
        ]);

        $cekPembayaran = PembayaranSmile::where('user_id', Auth::user()->id)->first();
        if ($cekPembayaran == null) {
            $pembayaran = PembayaranSmile::create([
                'user_id' => Auth::user()->id,
                'nominal' => 357900,
                'status' => 'Unpaid',
            ]);
        }
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/pengurus/pendaftaran');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'nik' => 'required|string|max:16',
            'no_kk' => 'required|string|max:16',
            'tanggal_lahir' => 'required|date',
            'nama_ibu_kandung' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_pendamping' => 'required|string|max:255',
            'no_pendamping' => 'required|string|max:15',
            'jurusan1' => 'required|string|max:255',
            'jurusan2' => 'required|string|max:255',
            'kta' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file PDF dengan ukuran maksimal 2MB
        ]);

        // Temukan data pendaftaran berdasarkan ID
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Handle file upload untuk kta
        $file_name = $pendaftaran->kta;
        if ($request->hasFile('kta')) {
            $file_name = $request->kta->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->kta->storeAs('public/kta', $namaGambar);
            $file_name = 'kta/' . $namaGambar;
        }

        // Update data pendaftaran
        $pendaftaran->update([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,
            'hp' => $request->hp,
            'email' => $request->email,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'alamat' => $request->alamat,
            'nama_pendamping' => $request->nama_pendamping,
            'no_pendamping' => $request->no_pendamping,
            'jurusan1' => $request->jurusan1,
            'jurusan2' => $request->jurusan2,
            'kta' => $file_name,
        ]);

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/pengurus/pendaftaran');
    }
}
