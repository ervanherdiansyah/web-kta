<?php

namespace App\Http\Controllers\Dashboard\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::latest()->paginate(10);

        if ($request->ajax()) {
            $data = Pembayaran::with('user')->latest();

            // Proses pencarian
            if (!empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $data->where(function ($query) use ($searchValue) {
                    $query->where('user_id', 'like', '%' . $searchValue . '%')
                        ->orWhere('jumlah_pembayaran', 'like', '%' . $searchValue . '%')
                        ->orWhere('status', 'like', '%' . $searchValue . '%')
                        ->orWhereHas('user', function ($query) use ($searchValue) {
                            $query->where('name', 'like', '%' . $searchValue . '%');
                        });
                });
            }

            return DataTables::of($data)
                ->addColumn('user_id', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->user->name . '</p> ';
                })
                ->addColumn('jumlah_pembayaran', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->jumlah_pembayaran . '</p> ';
                })
                ->addColumn('status', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->status . '</p> ';
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
                ->rawColumns(['user_id', 'jumlah_pembayaran', 'status', 'action'])
                ->make(true);
        }

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
