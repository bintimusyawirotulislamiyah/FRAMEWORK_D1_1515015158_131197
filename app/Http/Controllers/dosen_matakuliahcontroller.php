<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dosen_matakuliah;

class dosen_matakuliahcontroller extends Controller
{
     public function awal()
    {
    	return "Hello dari dosen_matakuliahcontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$dosen_matakuliah = new dosen_matakuliah();
		$dosen_matakuliah->dosen_id = '1';
		$dosen_matakuliah->matakuliah_id = '1';
		$dosen_matakuliah->save();
		return"data dengan dosen_id {$dosen_matakuliah->dosen_id} telah disimpan";
	}
}
