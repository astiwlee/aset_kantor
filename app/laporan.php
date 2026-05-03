<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    
    protected $table = 'laporan';
    protected $primaryKey = 'report_id';
    protected $fillable = ['nama_laporan', 'tipe_laporan', 'tanggal_generate', 'isi_laporan', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
