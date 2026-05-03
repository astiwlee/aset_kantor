<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'lokasi_id';
    protected $fillable = 'nama_lokasi';


    public function assets()
    {
        return $this->hasMany(Asset::class, 'Lokasi_id', 'Lokasi_id');
    }
}
