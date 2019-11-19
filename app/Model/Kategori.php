<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $connection = 'mysql';
    protected $fillable = [
        'id', 'nama_kategori'
    ];
}
