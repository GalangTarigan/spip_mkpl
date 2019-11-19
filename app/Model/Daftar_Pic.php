<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Daftar_Pic extends Model
{
    protected $table = 'daftar_pic';
    protected $connection = 'mysql';
    protected $primaryKey = 'id_pic';
    protected $fillable = [
        'instansi_id', 'nama_pic', 'kontak_pic'
    ];
    protected function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }
}
