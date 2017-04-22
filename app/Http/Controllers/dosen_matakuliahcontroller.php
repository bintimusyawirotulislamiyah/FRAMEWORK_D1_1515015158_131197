<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dosen_matakuliah;

use App\Dosen;

use App\Matakuliah;

class dosen_matakuliahcontroller extends Controller
{
	protected $guarded = ['id'];

	protected $informasi = 'Gagal Melakukan Aksi';

    public function awal()
    {
    	$semuaDosenMatakuliah = dosen_matakuliah::all();
    	return view('dosen_matakuliah.awal', compact('semuaDosenMatakuliah'));
	}

	public function tambah()
	{
		$dosen = new dosen;
		$matakuliah = new matakuliah;
		return view('dosen_matakuliah.tambah', compact('dosen','matakuliah'));
	}

	public function simpan(Request $input)
	{
		$this->validate($input,[
			'dosen'=>'required',
			'matakuliah'=>'required'
		]);
		
		$dosen_matakuliah = new dosen_matakuliah($input->only('dosen_id','matakuliah_id'));
		if($dosen_matakuliah->save()) $this->informasi = "Jadwal Dosen Mengajar Berhasil Disimpan";
		return redirect('dosen_matakuliah')->with(['informasi' => $this->informasi]);
	}

	public function edit($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		$dosen = new dosen;
		$matakuliah = new matakuliah;
		return view('dosen_matakuliah.edit', compact('dosen','matakuliah','dosen_matakuliah'));
	}

	public function lihat($id)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		return view('dosen_matakuliah.lihat', compact('dosen_matakuliah'));
	}

	public function update($id, Request $input)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		$dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
		if($dosen_matakuliah->save()) $this->informasi = "Jadwal Dosen Mengajar Berhasil Diperbarui";
		return redirect('dosen_matakuliah')->with(['informasi' => $this->informasi]);
	}

	public function hapus($id, Request $input)
	{
		$dosen_matakuliah = dosen_matakuliah::find($id);
		if($dosen_matakuliah->delete()) $this->informasi = "Jadwal Dosen Mengajar Berhasil Dihapus";
		return redirect('dosen_matakuliah')->with(['informasi' => $this->informasi]);
	}
}
