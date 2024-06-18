<?php

namespace App\Http\Controllers\Dashboard\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $pembayaran = Pembayaran::with('provinsi', 'kota')->latest()->get();
        // dd($pembayaran);

        if ($request->ajax()) {
            $data = Pembayaran::with('user', 'provinsi', 'kota')->latest()->get();

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
                    return htmlspecialchars($data->user->name);
                })
                ->addColumn('jumlah_pembayaran', function ($data) {
                    return htmlspecialchars($data->jumlah_pembayaran);
                })
                ->addColumn('updated_at', function ($data) {
                    $updated_at = Carbon::createFromFormat('Y-m-d', $data->updated_at)->translatedFormat('d F Y');
                    return htmlspecialchars($updated_at);
                })
                ->addColumn('status', function ($data) {
                    return htmlspecialchars($data->status);
                })
                ->addColumn('jenis_order', function ($data) {
                    return htmlspecialchars($data->jenis_order);
                })
                ->addColumn('provinsi_id', function ($data) {
                    return htmlspecialchars(optional($data->provinsi)->name ?? '');
                })
                ->addColumn('kota_id', function ($data) {
                    return htmlspecialchars(optional($data->kota)->name ?? '');
                })
                ->addColumn('kecamatan', function ($data) {
                    return htmlspecialchars($data->kecamatan);
                })
                ->addColumn('kelurahan', function ($data) {
                    return htmlspecialchars($data->kelurahan);
                })
                ->addColumn('kode_pos', function ($data) {
                    return htmlspecialchars($data->kode_pos);
                })
                ->addColumn('courier', function ($data) {
                    return htmlspecialchars($data->courier);
                })
                ->addColumn('shipping_price', function ($data) {
                    return htmlspecialchars($data->shipping_price);
                })
                ->addColumn('shipping_paket', function ($data) {
                    return htmlspecialchars($data->shipping_paket);
                })
                ->addColumn('shipping_status', function ($data) {
                    return htmlspecialchars($data->shipping_status);
                })
                ->addColumn('no_wa', function ($data) {
                    return htmlspecialchars($data->no_wa);
                })
                ->addColumn('action', function ($data) {
                    $phoneNumber = preg_replace('/^0/', '62', $data->no_wa);
                    return
                        '<a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#update' . $data->id . '">
                            <i class="fas fa-edit text-success text-sm opacity-10"></i>
                        </a>                 
                        <a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#delete' . $data->id . '">
                            <i class="fas fa-trash fa-xs text-danger text-sm opacity-10"></i>
                        </a> 
                        <a href="https://wa.me/' . $phoneNumber . '" target="_blank">
                            <i class="fa fa-whatsapp text-success text-sm opacity-10" aria-hidden="true"></i>
                        </a>
                        ';
                })
                ->rawColumns(['user_id', 'jumlah_pembayaran', 'status', 'action'])
                ->make(true);
        }

        return view('dashboard.pages.data.pembayaran.pembayaran');
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
        $pembayaran->status = $request->status;
        $pembayaran->shipping_status = $request->shipping_status;

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
