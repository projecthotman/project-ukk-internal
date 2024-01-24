<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'level', 'password'];

    public function data()
    {
        return $this->belongsTo(dataUserModels::class, 'id_user');
    }
}
