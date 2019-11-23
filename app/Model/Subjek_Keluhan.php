<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subjek_Keluhan extends Model
{
    protected $table = 'subjek_keluhan';
    protected $primaryKey = 'id_subjek';
    protected $fillable = [
        'nama_subjek',
        'created_at',
        'updated_at',
    ];
}
