<?php

namespace App\Http\Controllers\Dashboard\Smile;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSmile;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembayaranSmileController extends Controller
{
    public function index(Request $request)
    {
        $user = User::get();
        if ($request->ajax()) {
            $data = PembayaranSmile::latest()->get();
            if (!empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $data->where(function ($query) use ($searchValue) {
                    $query->where('user_id', 'like', '%' . $searchValue . '%')
                        ->orWhere('nominal', 'like', '%' . $searchValue . '%')
                        ->orWhere('status', 'like', '%' . $searchValue . '%')
                        ->orWhere('bukti_pembayaran', 'like', '%' . $searchValue . '%');
                });
            }

            return DataTables::of($data)
                ->addColumn('user_id', function ($data) {
                    return $data->user->name;
                })
                ->addColumn('nominal', function ($data) {
                    return $data->nominal;
                })
                ->addColumn('status', function ($data) {
                    return $data->status;
                })
                ->addColumn('bukti_pembayaran', function ($data) {
                    return '<img src="' . asset('storage/' . $data->bukti_pembayaran) . '" alt="Bukti Pembayaran" height="50">';
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
                ->rawColumns(['user_id', 'nominal', 'status', 'bukti_pembayaran', 'action'])
                ->make(true);
        }

        return view('dashboard.pages.smile.pembayaran-smile', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string|max:255',
            'nominal' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $file_name = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $file_name = $request->bukti_pembayaran->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $image = $request->bukti_pembayaran->storeAs('public/bukti_pembayaran', $namaGambar);
        }
        $pembayaran = PembayaranSmile::create([
            'user_id' => $request->id,
            'nominal' => $request->nominal,
            'status' => 'Unpaid',
            'bukti_pembayaran' => $file_name ? 'bukti_pembayaran/' . $namaGambar : null,
        ]);

        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/pembayaran-smile');
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nominal' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Temukan data pendaftaran berdasarkan ID
        $pembayaran = PembayaranSmile::findOrFail($id);

        // Handle file upload untuk kta
        if ($request->hasFile('bukti_pembayaran')) {
            $file_name = $request->bukti_pembayaran->getClientOriginalName();
            $namaGambar = str_replace(' ', '_', $file_name);
            $pembayaran->bukti_pembayaran = 'bukti_pembayaran/' . $namaGambar;
            $request->bukti_pembayaran->storeAs('public/bukti_pembayaran', $namaGambar);
        }
        // Update data pembayaran
        $pembayaran->update([
            'nominal' => $request->nominal,
            'status' => $request->status,
        ]);

        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/pembayaran-smile');
    }

    public function destroy($id)
    {
        $pembayaran = PembayaranSmile::findOrFail($id);
        $pembayaran->delete();

        toast('Berhasil Hapus Data!!!', 'success');
        return redirect('/dashboard/pembayaran-smile');
    }

    public function updateStatusPembayaran(Request $request, $id)
    {
        $pembayaran = PembayaranSmile::findOrFail($id);
        $pembayaran->update([
            'status' => $request->status,
        ]);
    }
}
