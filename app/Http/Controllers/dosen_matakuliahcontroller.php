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
	public function edit($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		return view('dosen_matakuliah.edit')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
	}
	public function lihat($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		return view('dosen_matakuliah.lihat')->with(array('dosen_matakuliah'=>$dosen_matakuliah));
	}
	public function update($id, Request $input)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		$dosen_matakuliah->dosen_id = $input->dosen_id;
		$dosen_matakuliah->matakuliah_id = $input->matakuliah_id;
		$informasi = $dosen_matakuliah->save() ? 'Berhasil update data' : 'Gagal update data';
		return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		$informasi = $dosen_matakuliah->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
		return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
	}
}
