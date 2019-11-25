<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = 'instansi';
    protected $connection = 'mysql';
    protected $primaryKey = 'id_instansi';
    protected $fillable = [
        'nama_instansi', 'kategori', 'provinsi', 'kabupaten_kota','alamat_instansi', 'email', 'no_telepon'
    ];
    public function laporan_instalasi()
    {
        return $this->hasMany(Laporan_Instalasi::class, 'instansi_id');
    }
    
    public function daftar_pic(){
        return $this->hasMany(Daftar_Pic::class, 'instansi_id');
    }
    public function laporan_keluhan(){
        return $this->hasMany(Instansi::class, 'instansi_id');
    }
}
