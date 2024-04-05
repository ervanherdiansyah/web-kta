<?php

namespace App\Http\Controllers\Siswa\Pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{

    public function index(Request $request)
    {

        $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->first();

        if ($pembayaran && $pembayaran->status == 'Paid') {
            return view('dashboard.pages.siswa.pembayaran.index', compact('pembayaran'));
        } else {
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            // \Midtrans\Config::$overrideNotifUrl = config('app.url') . '/api/callback';
            \Midtrans\Config::$overrideNotifUrl = 'https://eef6-114-79-49-224.ngrok-free.app/api/callback';

            $price = 35000;
            $item_details[] = array(
                'id' => rand(), // ID unik untuk ongkir
                'price' => $pembayaran->jumlah_pembayaran, // Harga ongkir
                'quantity' => 1, // Jumlahnya adalah 1 karena ongkir adalah satu item
                'name' => 'Biaya Pendaftaran', // Nama item ongkir
            );
            $params = array(
                'transaction_details' => array(
                    'order_id' => $pembayaran->id,
                    'gross_amount' => $pembayaran->jumlah_pembayaran,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ),
                'item_details' => $item_details,
            );
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('dashboard.pages.siswa.pembayaran.index', compact('snapToken', 'pembayaran'));
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if (($request->transaction_status == 'capture' && $request->payment_type == 'credit_card' && $request->fraud_status == 'accept') or $request->transaction_status == 'settlement') {
                $order = Pembayaran::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
}
