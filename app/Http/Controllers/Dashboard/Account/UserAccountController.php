<?php

namespace App\Http\Controllers\Dashboard\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class UserAccountController extends Controller
{
    public function index(Request $request)
    {
        $accountUser = User::paginate(10);

        if ($request->ajax()) {
            $data = User::latest();

            // Proses pencarian
            if (!empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $data->where(function ($query) use ($searchValue) {
                    $query->where('name', 'like', '%' . $searchValue . '%')
                        ->orWhere('email', 'like', '%' . $searchValue . '%');
                });
            }

            return DataTables::of($data)
                ->addColumn('name', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->name . '</p> ';
                })
                ->addColumn('email', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->email . '</p> ';
                })
                ->addColumn('role', function ($data) {
                    return '<p class="text-xs font-weight-bold mb-0">' . $data->role . '</p> ';
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
                        <a type="button" class="" data-bs-toggle="modal"
                            data-bs-target="#updatepassword' . $data->id . '">
                            <i class="fa fa-cog text-info text-sm opacity-10"
                                aria-hidden="true"></i>
                        </a>';
                })
                ->rawColumns(['name', 'email', 'role', 'action'])
                ->make(true);
        }
        return view('dashboard.pages.account.account', compact('accountUser'));
    }


    public function store(Request $request)
    {
        $accountUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);
        toast('Berhasil Tambah Data!!!', 'success');
        return redirect('/dashboard/account');
    }

    public function edit($id)
    {
        $accountUser = User::where('id', $id)->first();
        return view('dashboard.pages.account.editAccount', compact('accountUser'));
    }

    public function update(Request $request, $id)
    {
        $accountUser = User::where('id', $id)->first();
        $accountUser->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        toast('Berhasil Update Data!!!', 'success');
        return redirect('/dashboard/account');
    }

    public function destroy($id)
    {
        $accountUser = User::where('id', $id)->first();
        $accountUser->delete();
        toast('Berhasil Delete Data!!!', 'success');
        return redirect('/dashboard/account');
    }

    public function indexupdatepassword()
    {

        return view('dashboard.pages.pengaturan.changepassword');
    }
    public function indexupdatepassworduser()
    {

        return view('dashboard.pages.siswa.pengaturan.changepassword');
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            alert('Sukses', 'Password Berhasil Diganti', 'success');
            return redirect('/dashboard/changepassword');
        }
        throw ValidationException::withMessages([
            'current_password' => 'your current password does not mact with our record',
        ]);
    }

    public function updatepassworduser(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);
        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            alert('Sukses', 'Password Berhasil Diganti', 'success');
            return redirect('/peserta/changepassword');
        }
        throw ValidationException::withMessages([
            'current_password' => 'your current password does not mact with our record',
        ]);
    }


    public function ubahpassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::where('id', $id)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        alert('Sukses', 'Password Berhasil Diganti', 'success');
        return redirect('/dashboard/account');
    }
}
