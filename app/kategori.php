<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
   protected $table = 'kategori';
   protected $primaryKey = 'kategori_id';
   protected $fillable = ['nama_kategori', 'deskripsi']; 

public function assets()
{
    return $this->hasMany(Asset::class, 'kategori_id', 'kategori_id');
}

   }


