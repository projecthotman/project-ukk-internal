<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataUserModels extends Model
{
    use HasFactory;

    protected $table = 'data_user';
    protected $fillable = ['id_user', 'no_hp', 'jk', 'alamat', 'tempat_lahir', 'tanggal_lahir'];
}
