<?php

namespace App\Http\Controllers\Dashboard\Pendaftaran;

use App\Exports\FormExport;
use App\Http\Controllers\Controller;
use App\Imports\FormImport;
use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $pendaftaran = Form::latest()->paginate(10);

        if ($request->ajax()) {
            $data = Form::query();

            // Proses pencarian
            if (!empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $data->where(function ($query) use ($searchValue) {
                    $query->where('nama_lengkap', 'like', '%' . $searchValue . '%')
                        ->orWhere('kelas', 'like', '%' . $searchValue . '%')
                        ->orWhere('jurusan', 'like', '%' . $searchValue . '%')
                        ->orWhere('asal_sekolah', 'like', '%' . $searchValue . '%')
                        ->orWhere('alamat_asal_sekolah', 'like', '%' . $searchValue . '%')
                        ->orWhere('jenis_kelamin', 'like', '%' . $searchValue . '%')
                        ->orWhere('tempat_lahir', 'like', '%' . $searchValue . '%')
                        ->orWhere('tanggal_lahir', 'like', '%' . $searchValue . '%')
                        ->orWhere('agama', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%')
                        ->orWhere('hp', 'like', '%' . $searchValue . '%')
                        ->orWhere('instagram', 'like', '%' . $searchValue . '%')
                        ->orWhere('alamat', 'like', '%' . $searchValue . '%');
                });
            }

            $data = new Form;
            $data = $data->latest();
            return DataTables::of($data)
                ->addColumn('nama_lengkap', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->nama_lengkap . '</p> ';
                })
                ->addColumn('kelas', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->kelas . '</p> ';
                })
                ->addColumn('jurusan', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->jurusan . '</p> ';
                })
                ->addColumn('asal_sekolah', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->asal_sekolah . '</p> ';
                })
                ->addColumn('alamat_asal_sekolah', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->alamat_asal_sekolah . '</p> ';
                })
                ->addColumn('jenis_kelamin', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->jenis_kelamin . '</p> ';
                })
                ->addColumn('tempat_lahir', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->tempat_lahir . '</p> ';
                })
                ->addColumn('tanggal_lahir', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->tanggal_lahir . '</p> ';
                })
                ->addColumn('agama', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->agama . '</p> ';
                })
                ->addColumn('email', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->email . '</p> ';
                })
                ->addColumn('hp', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->hp . '</p> ';
                })
                ->addColumn('instagram', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->instagram . '</p> ';
                })
                ->addColumn('alamat', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->alamat . '</p> ';
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
                ->rawColumns(['nama_lengkap', 'kelas', 'jurusan', 'asal_sekolah', 'alamat_asal_sekolah', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'email', 'hp', 'instagram', 'alamat', 'action'])
                ->make(true);
        }

        return view('dashboard.pages.pendaftaran.pendaftaran', compact('pendaftaran'));
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
            'hp' => 'required|string|max:255',
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
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
        // try {

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with('error', 'Data Tidak Berhasil Tersimpan!');
        // }
    }

    public function update(Request $request, $id)
    {
        // Ambil data pendaftaran yang ingin diupdate
        $pendaftaran = Form::findOrFail($id);

        // Lakukan proses update
        $pendaftaran->user_id = $request->user_id;
        $pendaftaran->nama_lengkap = $request->nama_lengkap;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->tempat_lahir = $request->tempat_lahir;
        $pendaftaran->tanggal_lahir = $request->tanggal_lahir;
        $pendaftaran->agama = $request->agama;
        $pendaftaran->email = $request->email;
        $pendaftaran->hp = $request->hp;
        $pendaftaran->instagram = $request->instagram;

        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->provinsi = $request->provinsi;
        $pendaftaran->kota_kabupaten = $request->kota_kabupaten;
        $pendaftaran->kecamatan = $request->kecamatan;
        $pendaftaran->kelurahan = $request->kelurahan;

        $pendaftaran->kelas = $request->kelas;
        $pendaftaran->jurusan = $request->jurusan;
        $pendaftaran->asal_sekolah = $request->asal_sekolah;
        $pendaftaran->alamat_asal_sekolah = $request->alamat_asal_sekolah;



        // Update berkas pas_foto jika ada yang diunggah
        if ($request->hasFile('foto')) {
            $file_name = $request->foto->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $pendaftaran->foto = 'foto/' . $namaGambar;
            $request->foto->storeAs('public/foto', $namaGambar);
        }

        // Lanjutkan untuk berkas lainnya seperti ijaza, kartu_keluarga, akta_lahir

        $pendaftaran->save();

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
    }

    public function destroy($id)
    {
        $pendaftaran = Form::findOrFail($id);
        $pendaftaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
    }

    public function exportExcel()
    {
        return Excel::download(new FormExport, 'data-pendaftaran.xlsx');
    }
    public function importExcel(Request $request)
    {
        Excel::import(new FormImport, $request->file('upload'));

        toast('Berhasil Import Data!!!', 'success');
        return redirect('/dashboard/pendaftaran');
    }
}
