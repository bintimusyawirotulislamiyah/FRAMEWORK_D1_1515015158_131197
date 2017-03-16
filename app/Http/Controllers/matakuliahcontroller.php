<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Matakuliah;

class matakuliahcontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari matakuliahcontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$matakuliah = new matakuliah();
		$matakuliah->title = 'Pemrograman Framework';
		$matakuliah->keterangan = 'Wajib';
		$matakuliah->save();
		return"data dengan title {$matakuliah->title} telah disimpan";
	}
}
