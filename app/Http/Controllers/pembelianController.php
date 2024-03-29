<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\gambarbarangModels;
use App\Models\hargaBarangModel;
use App\Models\historyModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pembelianController extends Controller
{
    public function pembelian()
    {
        // dd($request);
        // Mengambil kategori dengan kolom nama dan id
        $kategori = KategoriModel::select('nama', 'id')->get();

        // Mendapatkan user_id saat ini
        $user_id = auth()->id();

        // Mengambil barang untuk pembelian dengan relasi yang dibutuhkan dan berdasarkan user_id
        $barang = BarangModel::with(['kategori', 'gambar', 'harga'])
            ->where('status', 'beli')
            ->where('id_user', $user_id) // Menambahkan kondisi user_id di sini
            ->get();

        return view('layouts.pages.input.barang.index', compact('kategori', 'barang'));
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
        $user_id = Auth::user()->id;

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
                    'id_user' => $user_id,
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

                $id_transk = $this->generateIdTransk($barang->created_at, $barang->id, $user_id);

                historyModel::create([
                    'id_barang' => $barang->id,
                    'id_user' => $user_id,
                    'tanggal' => $barang->created_at,
                    'nama' => 'beli',
                    'jumlah' => $request->stok,
                    'id_transk' => $id_transk,
                    'harga' => $request->harga_b * $request->stok,
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

            return redirect()->route('index-barang-beli')->with('success', 'Barang berhasil dibeli');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollback();

            return redirect()->route('index-barang-beli')->with('error', 'Terjadi kesalahan. Barang gagal dibeli. Pesan Error: ' . $e->getMessage());
        }
    }

    public function beliBarang(Request $request, $id)
{
    $uid = Auth::user()->id;
    $b = BarangModel::find($id);
    $b->update([
        'stok' => $b->stok - $request->angka,
    ]);

    $id_transk = $this->generateIdTransk($b->created_at, $b->id, $uid);

    // Membuat entri pertama dengan nama 'beli' dan id_user yang sama dengan $uid
    HistoryModel::create([
        'id_transk' => $id_transk,
        'id_barang' => $b->id,
        'id_user' => $uid,
        'nama' => "beli",
        'jumlah' => $request->angka,
        'harga' => $b->harga->harga_j * $request->angka,
        'tanggal' => now(),
    ]);

    // Membuat entri kedua dengan nama 'pendapatan' dan id_user yang berbeda
    HistoryModel::create([
        'id_transk' => $id_transk, // Tetap menggunakan id_transk yang sama
        'id_barang' => $b->id,
        'id_user' => $b->id_user, // Menggunakan id_user dari pemilik barang
        'nama' => "pendapatan",
        'jumlah' => $request->angka,
        'harga' => $b->harga->harga_j * $request->angka,
        'tanggal' => now(),
    ]);

    // Hapus barang jika stoknya habis
    if ($b->stok == 0) {
        // Hapus catatan terkait dengan barang
        $b->history()->delete();
        $b->harga()->delete();
        // Hapus entri gambar dari database
        $b->gambar()->delete();

        // Hapus barang itu sendiri
        $b->delete();
    }

    return redirect()->route('index-barang-jual')->with('success', 'Barang berhasil dibeli');
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
