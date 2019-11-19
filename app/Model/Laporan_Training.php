<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan_Training extends Model
{
    protected $connection = 'mysql';
    protected $table = 'laporan_training';
    protected $primaryKey = 'id_laporan_training';

    protected $fillable = [
        'laporan_instalasi_id', 'waktu_mulai_t', 'waktu_selesai_t', 'informasiTambahan'
    ];
    public function laporan_instalasi(){
        return $this->belongsTo(Laporan_Instalasi::class, 'laporan_instalasi_id');
    }
}
