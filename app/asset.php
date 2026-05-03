<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    
    protected $table = 'asset';
    protected $primaryKey = 'asset_id';
    protected $fillable = ['nama_aset', 'kategori_id', 'lokasi_id', 'status', 'tanggal_beli', 'harga'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'lokasi_id');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'asset_id', 'asset_id');
    }
}
