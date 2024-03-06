<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_history';
    protected $fillable = ['id_barang', 'nama', 'id_user', 'jumlah', 'id_transk', 'harga', 'tanggal'];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'id_barang', 'id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id');
    }
}
