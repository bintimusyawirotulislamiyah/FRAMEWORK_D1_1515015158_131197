<?php

namespace App;

use Illuminate\Auth\Authenticatable;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'pengguna';
    //protected $fillable = ['username','password'];
    protected $guarded = ['id'];
    
    public function mahasiswa()
    {
    	return $this->hasOne(Mahasiswa::class);
    }

    public function dosen()
    {
    	return $this->hasOne(dosen::class);
    }

    public function peran()
    {
    	return $this->belongsToMany(peran::class);
    }
}
