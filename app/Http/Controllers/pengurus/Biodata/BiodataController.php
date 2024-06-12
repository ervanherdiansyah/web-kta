<?php

namespace App\Http\Controllers\pengurus\Biodata;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $biodata = Form::where('user_id', $user)->first();
        // dd($biodata);
        return view('dashboard.pages.pengurus.biodata.index', compact('biodata'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hp' => 'required|max:255',
            'alamat' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',
        ]);
        $form = Form::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'hp' => $request->hp,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,

            // Alamat lengkap
            'alamat' => $request->alamat,
            // 'provinsi' => $request->provinsi,
            // 'kota_kabupaten' => $request->kota_kabupaten,
            // 'kecamatan' => $request->kecamatan,
            // 'kelurahan' => $request->kelurahan,

        ]);

        $pembayaran = Pembayaran::create([
            'user_id' => Auth::user()->id,
            'jumlah_pembayaran' => 50000,
            'tanggal_pembayaran' => now(),
            'status' => 'Unpaid',
        ]);

        toast('Berhasil Update!!!', 'success');
        return redirect('/pengurus/biodata');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'hp' => 'required|max:255',
            'alamat' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'alamat_asal_sekolah' => 'required|string|max:255',
        ]);
        $biodata = Form::where('user_id', Auth::user()->id)->first();
        $biodata->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'hp' => $request->hp,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_asal_sekolah' => $request->alamat_asal_sekolah,

            // Alamat lengkap
            'alamat' => $request->alamat,
            // 'provinsi' => $request->provinsi,
            // 'kota_kabupaten' => $request->kota_kabupaten,
            // 'kecamatan' => $request->kecamatan,
            // 'kelurahan' => $request->kelurahan,
        ]);


        toast('Berhasil Update Data!!!', 'success');
        return redirect('/pengurus/biodata');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        $accountUser = Form::where('id', $user)->first();
        $accountUser->delete();
        toast('Berhasil Delete Data!!!', 'success');
        return redirect('/pengurus/profile');
    }
}
