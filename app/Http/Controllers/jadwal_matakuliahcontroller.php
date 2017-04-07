<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jadwal_matakuliah;

use App\Mahasiswa;

use App\Dosen_matakuliah;

use App\Ruangan;

class jadwal_matakuliahcontroller extends Controller
{
	protected $informasi = 'Gagal Melakukan Aksi';
	
    public function awal()
    {
    	$semuaJadwalMatakuliah = jadwal_matakuliah::all();
    	return view('jadwal_matakuliah.awal', compact('semuaJadwalMatakuliah'));
	}
	public function tambah()
	{
		$mahasiswa = new mahasiswa;
		$ruangan = new ruangan;
		$dosen_matakuliah = new dosen_matakuliah;
		return view('jadwal_matakuliah.tambah', compact('mahasiswa','ruangan','dosen_matakuliah'));
	}

	public function simpan(Request $input)
	{
		$jadwal_matakuliah = new jadwal_matakuliah($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));
		if($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa Berhasil Disimpan";
		return redirect('jadwal_matakuliah')->with(['informasi' => $this->informasi]);
	}

	public function edit($id)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		$mahasiswa = new mahasiswa;
		$ruangan = new ruangan;
		$dosen_matakuliah = new dosen_matakuliah;
		return view('jadwal_matakuliah.edit', compact('mahasiswa','ruangan','dosen_matakuliah','jadwal_matakuliah'));
	}

	public function lihat($id)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		return view('jadwal_matakuliah.lihat', compact('jadwal_matakuliah'));
	}

	public function update($id,Request $input)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		$jadwal_matakuliah->fill($input->only('ruangan_id','dosen_matakuliah_id','mahasiswa_id'));
		if($jadwal_matakuliah->save()) $this->informasi = "Jadwal Mahasiswa Berhasil Diperbarui";
		return redirect('jadwal_matakuliah')->with(['informasi' => $this->informasi]);
	}

	public function hapus($id,Request $input)
	{
		$jadwal_matakuliah = jadwal_matakuliah::find($id);
		if($jadwal_matakuliah->delete()) $this->informasi = "Jadwal Mahasiswa Berhasil Dihapus";
		return redirect('jadwal_matakuliah')->with(['informasi'=>$this->informasi]);
	}
}
