<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table = 'dosen_matakuliah';
    
    public function dosen()
    {
    	return $this->belongsToMany(dosen::class);
    }

    public function matakuliah()
    {
    	return $this->belongsToMany(matakuliah::class);
    }
    public function jadwal_matakuliah()
    {
    	return $this->hasMany(jadwal_matakuliah::class);
    }
}
