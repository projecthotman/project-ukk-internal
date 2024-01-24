<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hargaBarangModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_harga_barang';
    protected $fillable = ['harga_j', 'harga_tj', 'harga_b', 'id_barang', 'harga_tb'];
}
