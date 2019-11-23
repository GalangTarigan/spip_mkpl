<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan_Keluhan_Daftar_Subjek extends Model
{
    protected $table = 'daftar_subjek_keluhan';
    protected $connection = 'mysql';
    protected $primaryKey = 'id_daftar_subjek_keluhan';
    protected $fillable = [
        'laporan_keluhan_id', 'subjek_keluhan_id'
    ];
    public function laporan_keluhan(){
        return $this->belongsTo(Laporan_Keluhan::class, 'laporan_keluhan_id', 'id_keluhan');
    }
    public function subjek_keluhan(){
        return $this->belongsTo(Subjek_Keluhan::class, 'subjek_keluhan_id','id_subjek');
    }
}
