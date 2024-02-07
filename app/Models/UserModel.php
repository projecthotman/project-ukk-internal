<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UserModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'level', 'password'];

    public function data()
    {
        return $this->belongsTo(dataUserModels::class, 'id_user');
    }
}
