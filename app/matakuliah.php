<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $fillable = ['tittle','keterangan'];

    public function dosen_matakuliah()
    {
    	return $this->hasMany(dosen_matakuliah::class);
    }

    public function listMatakuliah()
    {
        $out = [];
        foreach ($this->all() as $mtk) {
            $out[$mtk->id] = "{$mtk->title} ({$mtk->keterangan})";
        }
        return $out;
    }
}