<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_barang';
    protected $fillable = ['nama', 'kategori_id', 'id_user', 'deskripsi', 'stok', 'status']; // Mengganti 'gambar' menjadi 'gambar_id'

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'id');
    }

    public function gambar()
    {
        return $this->belongsTo(gambarbarangModels::class, 'id', 'id_barang');
    }
    public function harga()
    {
        return $this->belongsTo(hargaBarangModel::class, 'id', 'id_barang');
    }
    public function history()
    {
        return $this->belongsTo(historyModel::class, 'id', 'id_barang');
    }
}
