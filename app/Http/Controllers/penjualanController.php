<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\gambarbarangModels;
use App\Models\hargaBarangModel;
use App\Models\historyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class penjualanController extends Controller
{
    public function barangJual()
{
    // Mendapatkan user_id saat ini
    $user_id = auth()->id();

    // Mengambil barang untuk dijual dengan relasi yang dibutuhkan dan berdasarkan user_id
    $brnga = BarangModel::with(['kategori', 'gambar', 'harga', 'user'])
        ->where('status', 'jual')
        ->get();

    // Mengambil barang yang masih untuk pembelian dengan relasi harga yang dibutuhkan dan berdasarkan user_id
    $brngb = BarangModel::with(['harga'])
        ->where('status', 'beli')
        ->where('id_user', $user_id) // Menambahkan kondisi user_id di sini
        ->get();

    return view('layouts.pages.input.barang.post', compact('brnga', 'brngb', 'user_id'));
}


    public function inju(Request $request)
{
    $request->validate([
        'barang' => 'required',
        'untung' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    $barangId = $request->barang;
    $user_id = Auth::user()->id;

    // Mencari barang berdasarkan ID dan mengambil yang statusnya "beli"
    $barang = BarangModel::with(['harga', 'history', 'gambar'])
        ->where('id', $barangId)
        ->first();

    $st = $barang->stok;
    $rs = $request->stok;

        // Membuat instance baru dari barang yang dijual
        $barangB = BarangModel::create([
            'nama' => $barang->nama,
            'id_user' => $user_id,
            'kategori_id' => $barang->kategori_id,
            'deskripsi' => $barang->deskripsi,
            'stok' => $rs,
            'status' => 'jual',
        ]);

        // Membuat instance baru dari gambar barang
        gambarbarangModels::create([
            'id_barang' => $barangB->id,
            'nama_gambar_barang' => $barang->gambar->nama_gambar_barang,
            'gambar_trns' => $barang->gambar->gambar_trns,
        ]);

        // Membuat instance baru dari harga
        hargaBarangModel::create([
            'id_barang' => $barangB->id,
            'harga_b' => $barang->harga->harga_b,
            'harga_tb' => $barang->harga->harga_b * $request->stok,
            'harga_j' => $barang->harga->harga_b + ($barang->harga->harga_b * ($request->untung / 100)),
            'harga_tj' => ($barang->harga->harga_b + ($barang->harga->harga_b * ($request->untung / 100))) * $rs,
        ]);

        // Update stok dan harga barang yang sudah ada
        $barang->update([
            'stok' => $st - $rs,
        ]);

        $hb = $barang->harga->harga_b;
        $barang->harga->update([
            'harga_tb' => $barang->harga->harga_tb - ($hb * $request->stok),
        ]);
        $id_transk = $this->generateIdTransk($barang->created_at, $barang->id, $user_id);
        // Membuat instance baru dari history
        foreach ($barang->history as $historyItem) {
            $tanggal = $historyItem->tanggal;
        }
        HistoryModel::create([
            'id_user' => $user_id,
            'id_barang' => $barangB->id,
            'tanggal' => $tanggal,
            'nama' => "jual",
            'jumlah' => $request->stok,
            'id_transk' => $id_transk,
            'harga' => ($barang->harga->harga_b + ($barang->harga->harga_b * ($request->untung / 100))) * $rs,
        ]);

        // Hapus barang jika stoknya habis
        if ($barang->stok == 0) {
            // Hapus catatan terkait dengan barang
            $barang->history()->delete();
            $barang->harga()->delete();
            // Hapus entri gambar dari database
            $barang->gambar()->delete();


            // Hapus barang itu sendiri
            $barang->delete();
        }

        return redirect()->route('index-barang-jual')->with('success', 'Barang dimasukkan ke data barang jual');

}



private function generateIdTransk($created_at, $id_barang, $id_user)
    {
        // Contoh cara penggabungan data untuk id_transk
        $datePart = now()->format('Ymd');
        $idBarangPart = str_pad($id_barang, 5, '0', STR_PAD_LEFT);
        $idUserPart = str_pad($id_user, 5, '0', STR_PAD_LEFT);

        // Gabungkan bagian-bagian tersebut untuk membentuk id_transk
        $id_transk = $datePart . $idBarangPart . $idUserPart . Str::random(5);

        return $id_transk;
    }

}
