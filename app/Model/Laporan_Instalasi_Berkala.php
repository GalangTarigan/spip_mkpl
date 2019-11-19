<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan_Instalasi_Berkala extends Model
{
    protected $connection = 'mysql';
    protected $table = 'laporan_instalasi_berkala';
    protected $primaryKey = 'id_instalasi_berkala';
    protected $fillable = ['laporan_instalasi_id', 'subjek', 'isi_laporan'];

    protected function laporan_instalasi(){
        return $this->belongsTo(Laporan_Instalasi::class, 'laporan_instalasi_id');
    }
    
}
