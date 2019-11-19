<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi_Instalasi extends Model
{
    protected $table = 'dokumentasi_instalasi';
    protected $primaryKey = 'id_dokumen';
    protected $fillable = ['uuid', 'laporan_instalasi_id', 'keterangan', 'dokumentasi'];

    public function laporan_instalasi(){
        return $this->belongsTo(Laporan_Instalasi::class, 'laporan_instalasi_id');
    }

}
