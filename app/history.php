<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'history_id';
    protected $fillable = ['asset_id', 'tanggal_update', 'status_baru', 'catatan'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'asset_id');
    }
}
