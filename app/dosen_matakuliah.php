<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table = 'dosen_matakuliah';
    protected $fillable = ['dosen_id','matakuliah_id'];
    
    public function dosen()
    {
    	return $this->belongsTo(dosen::class);
    }

    public function matakuliah()
    {
    	return $this->belongsTo(matakuliah::class);
    }

    public function jadwal_matakuliah()
    {
    	return $this->hasMany(jadwal_matakuliah::class);
    }

    public function listDosenDanMatakuliah()
    {
        $out = [];
        foreach ($this->all() as $dsnMtk)
        {
            $out[$dsnMtk->id] = "{$dsnMtk->dosen->nama} (matakuliah{$dsnMtk->matakuliah->title})";
        }
        return $out;
    }
}
