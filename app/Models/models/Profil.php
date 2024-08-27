<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profil extends Model
{ 
	use HasFactory;
	protected $table      = 'profils';
	protected $dates      = ['created_at','updated_at','deleted_at'];
	protected $primaryKey = 'id';
    protected $fillable   = [
        'nama', 'id_admin', 'deskripsi', 'keterangan',       
    ];
    public function admin()
    {
        return $this->belongsTo('App\Models\User','id_admin');
    }
    public function media_profil()
    {
        return $this->hasMany('App\Models\models\MediaProfil','id_profil');
    }
}
