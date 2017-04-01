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
	public function edit($id)
	{
		$mahasiswa = mahasiswa::find($id);
		return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
	}
	public function lihat($id)
	{
		$mahasiswa = mahasiswa::find($id);
		return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
	}
	public function update($id, Request $input)
	{
		$mahasiswa = mahasiswa::find($id);
		$mahasiswa->nama = $input->nama;
		$mahasiswa->nim = $input->nim;
		$mahasiswa->alamat = $input->alamat;
		$mahasiswa->pengguna_id = $input->pengguna_id;
		$informasi = $mahasiswa->save() ? 'Berhasil update data' : 'Gagal update data';
		return redirect('mahasiswa')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$mahasiswa = mahasiswa::find($id);
		$informasi = $mahasiswa->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
		return redirect('mahasiswa')->with(['informasi'=>$informasi]);
	}
}
