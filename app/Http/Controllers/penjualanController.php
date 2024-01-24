<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\gambarbarangModels;
use App\Models\hargaBarangModel;
use App\Models\historyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class penjualanController extends Controller
{
    public function barangJual()
    {
        $brnga = BarangModel::with(['kategori', 'gambar', 'harga'])
            ->where('status', 'jual')
            ->get();
        $brngb = BarangModel::with(['harga'])
            ->where('status', 'beli')
            ->get();
        return view('layouts.pages.input.barang.post', compact([
            'brnga',
            'brngb',
        ]));
    }

    public function inju(Request $request)
{
    $request->validate([
        'barang' => 'required',
        'untung' => 'required|numeric',
        'stok' => 'required|numeric',
    ]);

    $barangId = $request->barang;

    // Mencari barang berdasarkan ID dan mengambil yang statusnya "beli"
    $barang = BarangModel::with(['harga', 'history', 'gambar'])
        ->where('id', $barangId)
        ->first();

    $st = $barang->stok;
    $rs = $request->stok;

        // Membuat instance baru dari barang yang dijual
        $barangB = BarangModel::create([
            'nama' => $barang->nama,
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

        // Membuat instance baru dari history
        HistoryModel::create([
            'id_barang' => $barangB->id,
            'tanggal' => $barang->history->tanggal,
            'nama' => "jual",
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

}