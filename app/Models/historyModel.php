<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_history';
    protected $fillable = ['id_barang', 'nama', 'tanggal'];
}
