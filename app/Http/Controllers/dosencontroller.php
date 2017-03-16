<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dosen;

class dosencontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari dosencontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$dosen = new dosen();
		$dosen->nama = 'Edy Budiman, MT';
		$dosen->nip = '19800404';
		$dosen->alamat = 'Jl. Gelatik';
		$dosen->pengguna_id = '1';
		$dosen->save();
		return"data dengan nama {$dosen->nama} telah disimpan";
	}
}
