<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\Biodata\ModelBiodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user()->id;
        $profile = ModelBiodata::with('user')->where('user_id', $user)->first();
        return view('dashboard.pages.profile.profile', compact('profile'));
    }

    public function store(Request $request)
    {
        $file_name = $request->foto->getClientOriginalName();
        $namaGambar = str_replace(' ', '_', $file_name);
        $image = $request->foto->storeAs('public/foto', $namaGambar);
        $accountUser = ModelBiodata::create([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'no_alter' => $request->no_alter,
            'foto' => 'foto/' . $namaGambar,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/profile');
    }

    public function edit()
    {
        $user = Auth::user()->id;
        $accountUser = User::with('user')->where('id', $user)->first();
        return view('dashboard.pages.account.editAccount', compact('accountUser'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $biodata = ModelBiodata::where('user_id', $user)->first();
        if (Request()->hasFile('foto')) {
            if (Storage::exists($biodata->foto)) {
                Storage::delete($biodata->foto);
            }

            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->foto->storeAs('public/foto', $namaGambar);

            // Update biodata based on conditions
            $biodata->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_wa' => $request->no_wa,
                'no_alter' => $request->no_alter,
                'foto' => 'foto/' . $namaGambar,
            ]);
        } else {
            // Update biodata without changing the foto fields
            $biodata->update([
                'user_id' => Auth::user()->id,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_wa' => $request->no_wa,
                'no_alter' => $request->no_alter,
            ]);
        }

        toast('Berhasil Update Data!!!', 'success');
        Alert::success('Data berhasil ditambahkan', 'Success Message');
        return redirect('/dashboard/profile');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        $accountUser = ModelBiodata::where('id', $user)->first();
        $accountUser->delete();
        toast('Berhasil Delete Data!!!', 'success');
        return redirect('/dashboard/profile');
    }
}
