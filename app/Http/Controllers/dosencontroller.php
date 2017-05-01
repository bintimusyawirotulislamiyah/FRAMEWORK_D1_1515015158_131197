<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\dosen;
use App\pengguna;
use App\Http\Requests\DosenRequest;

class dosenController extends Controller
{
  protected $informasi = 'Gagal malakukan aksi';
  public function awal()
  {
    $semuaDosen = dosen::all();
  	return view('dosen.awal', compact('semuaDosen'));
  }
  public function tambah()
  {
  	return view('dosen.tambah');
  }
  public function simpan(DosenRequest $input)
  {
    $pengguna = new pengguna($input->only('username','password'));
      if ($pengguna->save())
      {
        $dosen = new dosen;
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
          if ($pengguna->dosen()->save($dosen)) $this->informasi = 'Berhasil simpan data';
    }
      return redirect('dosen')->with(['informasi' => $this->informasi]);
    }
    public function edit($id)
    {
      $dosen = dosen::find($id);
      return view('dosen.edit')->with(array('dosen' => $dosen));
    }
    public function lihat($id)
    {
      $dosen = dosen::find($id);
      return view('dosen.lihat')->with(array('dosen' => $dosen));
    }
    public function update($id, DosenRequest $input)
    {
      $dosen = dosen::find($id);
      $dosen->nama = $input->nama;
      $dosen->nip = $input->nip;
      $dosen->alamat = $input->alamat;
      $dosen->save();
      
        if (!is_null($input->username))
        {
          $pengguna = $dosen->pengguna->fill($input->only('username'));
          if (!empty($input->password)) $pengguna->password = $input->password;
          if ($pengguna->save()) $this->informasi = 'Berhasil simpan data';
        }
        else
        {
          $this->informasi = 'Berhasil simpan data';
        }
        
        return redirect('dosen')->with(['informasi' => $this->informasi]);
      }
      public function hapus($id)
      {
        $dosen = dosen::find($id);
        if ($dosen->pengguna()->delete())
        {
          if ($dosen->delete()) $this->informasi = 'Berhasil hapus data';
        }
        return redirect('dosen')->with(['informasi' => $this->informasi]);
        }
  
}