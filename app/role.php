<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'role_id';
    protected $fillable = ['nama_role', 'deskripsi'];

    
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'role_id');
    }
}
