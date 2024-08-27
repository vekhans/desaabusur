<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function profil()
    {
        return $this->hasMany('App\Models\models\Profil','id_admin');
    }
    public function mediaprofil()
    {
        return $this->hasMany('App\Models\models\media_profil','id_admin');
    }
    public function jenis_berita()
    {
        return $this->hasMany('App\Models\models\Jenis_Berita','id_admin');
    }
    public function jenis_berita1()
    {
        return $this->hasMany('App\Models\models\Jenis_Berita','id_ad');
    }
    public function jenis_berita2()
    {
        return $this->hasMany('App\Models\models\Jenis_Berita','id_de');
    }
    public function beritas()
    {
        return $this->hasMany('App\Models\models\Berita','id_admin');
    }
    public function beritas1()
    {
        return $this->hasMany('App\Models\models\Berita','id_ad');
    }
    public function beritas2()
    {
        return $this->hasMany('App\Models\models\Berita','id_de');
    }
    public function slidede()
    {
        return $this->hasMany('App\Models\models\Slide','id_de');
    }
    public function slidead()
    {
        return $this->hasMany('App\Models\models\Slide','id_admin');
    }
    public function beritas3()
    {
        return $this->hasMany('App\Models\models\Berita','id_publish');
    }
    public function mberitas1()
    {
        return $this->hasMany('App\Models\models\Media_Berita','id_ad');
    }
    public function mberitas2()
    {
        return $this->hasMany('App\Models\models\Media_Berita','id_de');
    }
}
