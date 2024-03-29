<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\historyModel;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function intrapem()
    {


$barangBeli = BarangModel::whereHas('history', function ($query) {
    $user_id = auth()->id();
    $query->where('id_user', $user_id);
    })->with(['harga', 'history', 'gambar', 'kategori'])->paginate(10);
        return view('layouts.pages.transaksi.pembelian.index', compact([
            'barangBeli',
        ]));
    }

    public function protrapem(Request $request)
    {
        dd($request);
    }
    public function intrapen()
    {
        $barangJual = BarangModel::whereHas('history', function ($query) {
            $user_id = auth()->id();
            $query->where('nama', 'jual')
                  ->where('id_user', $user_id);
        })->with(['harga', 'history', 'gambar', 'kategori'])
          ->paginate(10);
        return view('layouts.pages.transaksi.penjualan.index', compact([
            'barangJual',
        ]));
    }
}
