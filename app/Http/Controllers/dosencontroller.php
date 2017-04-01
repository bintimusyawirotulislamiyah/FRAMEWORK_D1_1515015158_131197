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
	public function edit($id)
	{
		$dosen = dosen::find($id);
		return view('dosen.edit')->with(array('dosen'=>$dosen));
	}
	public function lihat($id)
	{
		$dosen = dosen::find($id);
		return view('dosen.lihat')->with(array('dosen'=>$dosen));
	}
	public function update($id, Request $input)
	{
		$dosen = dosen::find($id);
		$dosen->nama = $input->nama;
		$dosen->nip = $input->nip;
		$dosen->alamat = $input->alamat;
		$dosen->pengguna_id = $input->pengguna_id;
		$informasi = $dosen->save() ? 'Berhasil update data' : 'Gagal update data';
		return redirect('dosen')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosen = dosen::find($id);
		$informasi = $dosen->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
		return redirect('dosen')->with(['informasi'=>$informasi]);
	}
}
