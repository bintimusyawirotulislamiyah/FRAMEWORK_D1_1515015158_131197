<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jadwal_matakuliah;

class jadwal_matakuliahcontroller extends Controller
{
    public function awal()
    {
    	return "Hello dari jadwal_matakuliahcontroller";
	}
	public function tambah()
	{
		return $this->simpan();
	}
	public function simpan()
	{
		$jadwal_matakuliah = new jadwal_matakuliah();
		$jadwal_matakuliah->mahasiswa_id = '4';
		$jadwal_matakuliah->ruangan_id = '1';
		$jadwal_matakuliah->dosen_matakuliah_id = '1';
		$jadwal_matakuliah->save();
		return"data dengan mahasiswa_id {$jadwal_matakuliah->mahasiswa_id} telah disimpan";
	}
	public function edit($id)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
	}
	public function lihat($id)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
	}
	public function update($id, Request $input)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		$jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
		$jadwal_matakuliah->ruangan_id = $input->ruangan_id;
		$jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
		$informasi = $jadwal_matakuliah->save() ? 'Berhasil update data' : 'Gagal update data';
		return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
	}
	public function hapus($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		$informasi = $dosen_matakuliah->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
		return redirect('dosen_matakuliah')->with(['informasi'=>$informasi]);
	}
}
