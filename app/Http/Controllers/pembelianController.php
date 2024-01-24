<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\gambarbarangModels;
use App\Models\hargaBarangModel;
use App\Models\historyModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembelianController extends Controller
{
    public function pembelian()
    {
        $nk = KategoriModel::select('nama', 'id')->get();
        return view('layouts.pages.transaksi.pembelian.index', compact([
            'nk'
        ]));
    }
    

    public function inpem(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'deskripsi' => 'required',
            'harga_b' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar_transaksi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $g = $request->file('gambar');
        $gt = $request->file('gambar_transaksi');

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            if ($g || $gt) { // Mengganti kondisi dari $g && $gt menjadi $g || $gt
                // membuat nama file
                $namaFile = $g ? time() . rand(100, 999) . "." . $g->getClientOriginalExtension() : null;
                $namaFileTransaksi = $gt ? time() . rand(100, 999) . "." . $gt->getClientOriginalExtension() : null;

                // Menyimpan data barang ke database dengan gambar_id yang baru saja dibuat
                $barang = BarangModel::create([
                    'nama' => $request->nama,
                    'kategori_id' => $request->kategori_id,
                    'deskripsi' => $request->deskripsi,
                    'stok' => $request->stok,
                    'status' => "beli",
                ]);

                // Menyimpan data gambar ke database
                if ($g) {
                    gambarbarangModels::create([
                        'id_barang' => $barang->id,
                        'nama_gambar_barang' => $namaFile,
                        'gambar_trns' => $namaFileTransaksi,
                    ]);
                }

                // Menyimpan harga barang ke database
                hargaBarangModel::create([
                    'id_barang' => $barang->id,
                    'harga_b' => $request->harga_b,
                    'harga_tb' => $request->harga_b * $request->stok,
                ]);

                historyModel::create([
                    'id_barang' => $barang->id,
                    'tanggal' => $barang->created_at,
                    'nama' => 'beli',
                ]);

                // Menyimpan gambar ke direktori public/storage/gambar_barang
                if ($g) {
                    $g->move(public_path('storage/gambar_barang'), $namaFile);
                }

                // Menyimpan gambar transaksi ke direktori public/storage/gambar_transaksi
                if ($gt) {
                    $gt->move(public_path('storage/gambar_transaksi'), $namaFileTransaksi);
                }
            } else {
                // Tampilkan error jika salah satu dari $g atau $gt kosong
                throw new \Exception('Gambar atau Gambar Transaksi tidak boleh kosong');
            }

            // Commit transaksi jika tidak ada error
            DB::commit();

            return redirect()->route('index-barang-gudang')->with('success', 'Barang berhasil dibeli');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollback();

            return redirect()->route('index-barang-gudang')->with('error', 'Terjadi kesalahan. Barang gagal dibeli. Pesan Error: ' . $e->getMessage());
        }
    }
}
