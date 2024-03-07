<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanModels extends Model
{
    use HasFactory;

    protected $table = 'tbl_pesan';
    protected $fillable = ['pesan', 'kategori', 'user_id', 'status'];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
