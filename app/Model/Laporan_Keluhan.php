<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan_Keluhan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'laporan_keluhan';
    protected $primaryKey = 'id_keluhan';
    protected $fillable = [
        'pelapor_id','instansi_id', 'daftar_subjek_keluhan_id', 'waktu_lapor_keluhan','permasalahan','solusi','waktu_selesai_penanganan'
    ];
    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id_instansi');
    }
    public function daftar_subjek(){
        return $this->hasMany(Laporan_Keluhan_Daftar_Subjek::class, 'laporan_keluhan_id');
    }
}
