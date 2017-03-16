<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mahasiswa;

class mahasiswacontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari mahasiswacontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$mahasiswa = new mahasiswa();
		$mahasiswa->nama = 'Binti Musyawirotul Islamiyah';
		$mahasiswa->nim = '1515015158';
		$mahasiswa->alamat = 'Lumajang';
		$mahasiswa->pengguna_id = '1';
		$mahasiswa->save();
		return"data dengan nama {$mahasiswa->nama} telah disimpan";
	}
}
