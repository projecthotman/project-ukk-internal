<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambarbarangModels extends Model
{
    use HasFactory;

    protected $table = 'tbl_gambar_barang';
    protected $fillable = ['nama_gambar_barang', 'id_barang', 'gambar_trns'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang');
    }
}
