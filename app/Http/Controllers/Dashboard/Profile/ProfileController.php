<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
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
        $profile = User::where('id', $user)->first();
        return view('dashboard.pages.profile.profile', compact('profile'));
    }

    public function store(Request $request)
    {
        $file_name = $request->foto->getClientOriginalName();
        $namaGambar = str_replace(' ', '_', $file_name);
        $image = $request->foto->storeAs('public/foto', $namaGambar);
        $accountUser = Profile::create([
            'user_id' => Auth::user()->id,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'foto' => 'foto/' . $namaGambar,
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $user->foto = 'foto/' . $namaGambar;
            $request->foto->storeAs('public/foto', $namaGambar);
        }
        $user->save();

        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/profile');
    }

    public function update(Request $request, $id)
    {
        // $user = Auth::user()->id;
        // $profile = User::where('id', $user)->first();
        // if (Request()->hasFile('foto')) {
        //     if (Storage::exists($profile->foto)) {
        //         Storage::delete($profile->foto);
        //     }

        //     $file_name = $request->foto->getClientOriginalName();
        //     $namaGambar = str_replace(' ', '_', $file_name);
        //     $image = $request->foto->storeAs('public/foto', $namaGambar);

        //     $profile->update([
        //         'fullname' => $request->fullname,
        //         'email' => $request->email,
        //         'nohp' => $request->nohp,
        //         'foto' => 'foto/' . $namaGambar,
        //     ]);
        // } else {
        //     $profile->update([
        //         'name' => $request->name,
        //         'fullname' => $request->fullname,
        //         'email' => $request->email,
        //         'nohp' => $request->nohp,
        //     ]);
        // }

        $user = User::where('id', Auth::user()->id)->first();
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $user->foto = 'foto/' . $namaGambar;
            $request->foto->storeAs('public/foto', $namaGambar);
        }
        $user->name = $request->name;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/profile');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        $accountUser = Profile::where('id', $user)->first();
        $accountUser->delete();
        toast('Berhasil Delete Data!!!', 'success');
        return redirect('/dashboard/profile');
    }
}
