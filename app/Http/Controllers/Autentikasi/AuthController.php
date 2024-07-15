<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Session;

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
            return '/peserta/biodata';
        } else if (Auth::user()->role === 'pengurus') {
            Alert::success('SELAMAT & SUKSES', 'Atas terpilihnya sebagai Pengurus Forum OSIS Jawa Barat Generasi 12');
            return '/pengurus/biodata';
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
        // $request->session()->put('registerData', $request->all());
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'user',
            ]);
            // $registerData = $request->session()->get('registerData');
            // $responseData = [
            //     'user' => $user,
            //     'registerData' => $registerData,
            // ];
            $request->session()->put('user_id', $user->id);
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422); // respons kesalahan dengan status kode 422 (Unprocessable Entity)
        }
    }

    //Register
    public function showForm()
    {
        return view('auths.form');
    }
    public function createForm(Request $request)
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
        $file_name = null;
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->foto->storeAs('public/foto', $namaGambar);
        }
        $userId = $request->session()->get('user_id') ?? $request->user_id;
        $form = Form::create([
            'user_id' => $userId,
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

        $pembayaran = Pembayaran::create([
            'user_id' => $userId,
            'jumlah_pembayaran' => 50000,
            'tanggal_pembayaran' => now(),
            'status' => 'Unpaid',
        ]);

        $request->session()->forget('user_id');

        toast('Berhasil Pendaftaran!!!', 'success');
        return redirect('/');
    }
}
