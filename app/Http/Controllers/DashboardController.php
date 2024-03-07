<?php

namespace App\Http\Controllers;

use App\Models\pesanModels;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();
        $user = UserModel::with(['data'])
            ->find($user_id);
        return view('layouts.pages.dashboard.index', compact([
            'user',
        ]));
    }

    public function topUp()
    {
        return view('layouts.pages.dashboard.topUp');
    }

    public function topUpAction(Request $request)
    {
        $uid = Auth::user();
        pesanModels::create([
            'user_id' => $uid->id,
            'pesan' => "User dengan email " . $uid->email . " ingin melakukan Top Up sebesar " . $request->jumlah . " konfirmasi jika user sudah melakukan pembayaran",
            'kategori' => "cnfrm_topup",
            'status' => 'baca',
        ]);

        return redirect()->route('dashboard')->with('success', 'Permintaan isi ulang berhasil terkirim. Saldo akan otomatis ditambahkan saat admin mengkonfirmasi');
    }

    public function pesan()
    {
        $userId = Auth::user()->id;

        // Cek level user
        $userLevel = Auth::user()->level; // Sesuaikan dengan nama kolom level pada tabel users

        // Tentukan kategori pesan yang akan diambil berdasarkan level user
        $kategoriPesan = ($userLevel === 'admin') ? 'cnfrm_topup' : 'kategori_lainnya';

        // Ambil pesan dari tabel pesanModels berdasarkan kondisi
        $pesan = pesanModels::where('kategori', $kategoriPesan)
            ->with('user', 'user.data')
            ->get();
        return view('layouts.pages.dashboard.pesan', compact([
            'pesan'
        ]));
    }
}
