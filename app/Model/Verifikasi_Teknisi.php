<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Verifikasi_Teknisi extends Model
{
    protected $guarded = [];
    protected $table = 'verifikasi_teknisi';
    protected $fillable = ['user_id','token','created_at'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
