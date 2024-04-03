<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //Login
    public function index()
    {
        return view('auths.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            // Jika berhasil login, arahkan ke dashboard sesuai peran
            return redirect()->intended($this->redirectTo());
        }

        toast('Username dan Password Salah!!!', 'warning');
        return redirect('/');
    }

    // Fungsi untuk menentukan rute dashboard berdasarkan peran pengguna
    protected function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            toast('Berhasil Login!!!', 'success');
            return '/dashboard/home';
        } else if (Auth::user()->role === 'user') {
            toast('Berhasil Login!!!', 'success');
            return '/user/home';
        }
    }
    // Fungsi untuk logout
    public function logout(Request $request)
    {
        $request->session()->flush(); // Flush all session data
        Auth::logout();
        toast('Berhasil Logout!!!', 'success');
        return redirect('/');
    }

    //Register
    public function showRegisterForm()
    {
        return view('auths.register');
    }

    public function createRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return response()->json($user);
    }

    //Register
    public function showForm()
    {
        return view('auths.form');
    }
    public function createForm(Request $request)
    {

        $file_name = null;
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->foto->storeAs('public/foto', $namaGambar);
        }

        $form = Form::create([
            'user_id' => $request->user_id,
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
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,

            'foto' => $file_name ? 'pas_foto/' . $namaGambar : null,

        ]);
        toast('Berhasil Pendaftaran!!!', 'success');
        return redirect('/');
    }
}
