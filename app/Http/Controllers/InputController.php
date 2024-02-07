<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\gambarbarangModels;
use App\Models\hargaBarangModel;
use App\Models\kategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InputController extends Controller
{
    public function kategori()
    {
        $kategori = kategoriModel::select('nama', 'gambar')->get();
        return view('layouts.pages.input.kategori.index', compact([
            'kategori'
        ]));
    }


    public function creatgor()
    {
        return view('layouts.pages.input.kategori.create');
    }

    public function incat(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Tambahkan validasi untuk jenis file gambar
        ]);
        // dd($request);
        // Mengambil objek gambar dari request
        $nm = $request->file('gambar');

        // Jika ada file gambar yang diupload
        if ($nm) {
            // membuat nama file
            $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

            // Menyimpan data kategori ke database
            kategoriModel::create([
                'nama' => $request->nama,
                'gambar' => $namaFile,
            ]);

            // Menyimpan gambar ke direktori public/storage/gambar
            $nm->move(public_path('storage/gambar'), $namaFile);

            return redirect()->route('index-kategori')->with('success', 'Data berhasil disimpan');
        } else {
            // Jika tidak ada gambar diupload, hanya simpan data kategori
            kategoriModel::create([
                'nama' => $request->nama,
                'gambar' => null,
            ]);

            return redirect()->route('index-kategori')->with('success', 'Data berhasil disimpan');
        }
    }

}
