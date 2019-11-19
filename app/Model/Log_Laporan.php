<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Log_Laporan extends Model
{
    protected $connection = 'mysql';
    protected $table = 'log_laporan';
    protected $fillable = [
        'laporan_instalasi_id', 'log'
    ];
}
