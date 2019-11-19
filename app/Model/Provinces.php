<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $connection = 'mysql';
    protected $table = 'provinces';
    protected function regencies(){
        return $this->hasMany('App\Model\Regencies');
    }
}
