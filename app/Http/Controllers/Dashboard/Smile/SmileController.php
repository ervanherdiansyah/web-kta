<?php

namespace App\Http\Controllers\Dashboard\Smile;

use App\Exports\SmileExport;
use App\Http\Controllers\Controller;
use App\Models\PembayaranSmile;
use App\Models\Pendaftaran\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SmileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::get();
        if ($request->ajax()) {
            $data = Pendaftaran::latest()->get();
            if (!empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $data->where(function ($query) use ($searchValue) {
                    $query->where('nama_lengkap', 'like', '%' . $searchValue . '%')
                        ->orWhere('tanggal_lahir', 'like', '%' . $searchValue . '%')
                        ->orWhere('hp', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%')
                        ->orWhere('alamat', 'like', '%' . $searchValue . '%')
                        ->orWhere('asal_sekolah', 'like', '%' . $searchValue . '%')
                        ->orWhere('kelas', 'like', '%' . $searchValue . '%')
                        ->orWhere('alamat_asal_sekolah', 'like', '%' . $searchValue . '%')
                        ->orWhere('nama_ibu_kandung', 'like', '%' . $searchValue . '%')
                        ->orWhere('nik', 'like', '%' . $searchValue . '%')
                        ->orWhere('no_kk', 'like', '%' . $searchValue . '%')
                        ->orWhere('jurusan1', 'like', '%' . $searchValue . '%')
                        ->orWhere('jurusan2', 'like', '%' . $searchValue . '%');
                });
            }

            return DataTables::of($data)
                ->addColumn('nama_lengkap', function ($data) {
                    return $data->nama_lengkap;
                })
                ->addColumn('tanggal_lahir', function ($data) {
                    return $data->tanggal_lahir;
                })
                ->addColumn('hp', function ($data) {
                    return $data->hp;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('alamat', function ($data) {
                    return $data->alamat;
                })
                ->addColumn('asal_sekolah', function ($data) {
                    return $data->asal_sekolah;
                })
                ->addColumn('kelas', function ($data) {
                    return $data->kelas;
                })
                ->addColumn('alamat_asal_sekolah', function ($data) {
                    return $data->alamat_asal_sekolah;
                })
                ->addColumn('nama_ibu_kandung', function ($data) {
                    return $data->nama_ibu_kandung;
                })
                ->addColumn('nik', function ($data) {
                    return $data->nik;
                })
                ->addColumn('no_kk', function ($data) {
                    return $data->no_kk;
                })
                ->addColumn('jurusan1', function ($data) {
                    return $data->jurusan1;
                })
                ->addColumn('jurusan2', function ($data) {
                    return $data->jurusan2;
                })
                ->addColumn('action', function ($data) {
                    return
                        '<a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#update' . $data->id . '">
                            <i class="fas fa-edit text-success text-sm opacity-10"></i>
                        </a> 
                        <a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#delete' . $data->id . '">
                            <i class="fas fa-trash fa-xs text-danger text-sm opacity-10"></i>
                        </a> 
                        
                        ';
                })
                ->rawColumns(['nama_lengkap', 'tanggal_lahir', 'hp', 'email', 'alamat', 'asal_sekolah', 'kelas', 'alamat_asal_sekolah', 'nama_ibu_kandung', 'nik', 'no_kk', 'jurusan1', 'jurusan2', 'action'])
                ->make(true);
        }

        return view('dashboard.pages.smile.index', compact('user'));
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
            // 'nama_pendamping' => 'required|string|max:255',
            // 'no_pendamping' => 'required|string|max:15',
            'jurusan1' => 'required|string|max:255',
            'jurusan2' => 'required|string|max:255',
            // 'kta' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file PDF dengan ukuran maksimal 2MB
        ]);
        $file_name = null;
        if ($request->hasFile('kta')) {
            $file_name = $request->kta->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->kta->storeAs('public/kta', $namaGambar);
        }

        $pendaftaran = Pendaftaran::create([
            'user_id' => $request->user_id,
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

        $cekPembayaran = PembayaranSmile::where('user_id', $pendaftaran->user_id)->first();
        if ($cekPembayaran == null) {
            $pembayaran = PembayaranSmile::create([
                'user_id' => $pendaftaran->user_id,
                'nominal' => 357900,
                'status' => 'Unpaid',
            ]);
        }
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/pendaftaran-smile');
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
            // 'nama_pendamping' => 'required|string|max:255',
            // 'no_pendamping' => 'required|string|max:15',
            'jurusan1' => 'required|string|max:255',
            'jurusan2' => 'required|string|max:255',
            // 'kta' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validasi untuk file PDF dengan ukuran maksimal 2MB
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
        return redirect('/dashboard/pendaftaran-smile');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/pendaftaran-smile');
    }

    public function exportExcel()
    {
        return Excel::download(new SmileExport, 'data-smile.xlsx');
    }
}
