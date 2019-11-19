<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;
use App\Model\Laporan_Instalasi;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    const admin = 'admin';
    const user = 'default';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mysql';
    protected $table ='users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_lengkap', 'uuid', 'email', 'password', 'no_telepon', 'photo', 'alamat', 'role', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function hasDefaultRole(){
        return $this->role === self::user;
    }
    public function hasAdminRole(){
        return $this->role === self::admin;
    }
    public function laporan_instalasi(){
        return $this->hasMany(Laporan_Instalasi::class, 'user_id', 'id');
    }
    public function verifikasiTeknisi(){
        return $this->hasOne('App\Model\Verifikasi_Teknisi');
    }

}
