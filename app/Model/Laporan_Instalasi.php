<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Laporan_Instalasi extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'laporan_instalasi';
    protected $connection = 'mysql';
    protected $fillable = [
        'uuid','user_nama', 'user_id', 'instansi_id', 'waktu_mulai', 'waktu_selesai', 'status'
    ];
    protected $primaryKey = 'id_laporan';
    public function createNew(){

    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function instansi(){
        return $this->belongsTo(Instansi::class, 'instansi_id');
    }
    public function log_laporan(){
        return $this->hasMany(Log_Laporan::class);
    }
    public function laporan_training(){
        return $this->hasOne(Laporan_Training::class, 'laporan_instalasi_id');
    }
    public function dokumentasi(){
        return $this->hasMany(Dokumentasi_Instalasi::class, 'laporan_instalasi_id');
    }
    public function laporan_berkala(){
        return $this->hasMany(Laporan_Instalasi_Berkala::class, 'laporan_instalasi_id');
    }
}

