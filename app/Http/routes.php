<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah','PenggunaController@tambah');
Route::get('pengguna/{pengguna}','PenggunaController@lihat');
Route::post('pengguna/simpan','PenggunaController@simpan');
Route::get('pengguna/edit/{pengguna}','PenggunaController@edit');
Route::post('pengguna/edit/{pengguna}','PenggunaController@update');
Route::get('pengguna/hapus/{pengguna}','PenggunaController@hapus');

Route::get('ruangan','ruangancontroller@awal');
Route::get('ruangan/tambah','ruangancontroller@tambah');
Route::get('ruangan/{ruangan}','ruangancontroller@lihat');
Route::post('ruangan/simpan','ruangancontroller@simpan');
Route::get('ruangan/edit/{ruangan}','ruangancontroller@edit');
Route::post('ruangan/edit/{ruangan}','ruangancontroller@update');
Route::get('ruangan/hapus/{ruangan}','ruangancontroller@hapus');

Route::get('matakuliah','matakuliahcontroller@awal');
Route::get('matakuliah/tambah','matakuliahcontroller@tambah');
Route::get('matakuliah/{matakuliah}','matakuliahcontroller@lihat');
Route::post('matakuliah/simpan','matakuliahcontroller@simpan');
Route::get('matakuliah/edit/{matakuliah}','matakuliahcontroller@edit');
Route::post('matakuliah/edit/{matakuliah}','matakuliahcontroller@update');
Route::get('matakuliah/hapus/{matakuliah}','matakuliahcontroller@hapus');

Route::get('mahasiswa','mahasiswacontroller@awal');
Route::get('mahasiswa/tambah','mahasiswacontroller@tambah');
Route::get('mahasiswa/{mahasiswa}','mahasiswacontroller@lihat');
Route::post('mahasiswa/simpan','mahasiswacontroller@simpan');
Route::get('mahasiswa/edit/{mahasiswa}','mahasiswacontroller@edit');
Route::post('mahasiswa/edit/{mahasiswa}','mahasiswacontroller@update');
Route::get('mahasiswa/hapus/{mahasiswa}','mahasiswacontroller@hapus');

Route::get('dosen','dosencontroller@awal');
Route::get('dosen/tambah','dosencontroller@tambah');
Route::get('dosen/{dosen}','dosencontroller@lihat');
Route::post('dosen/simpan','dosencontroller@simpan');
Route::get('dosen/edit/{dosen}','dosencontroller@edit');
Route::post('dosen/edit/{dosen}','dosencontroller@update');
Route::get('dosen/hapus/{dosen}','dosencontroller@hapus');

Route::get('dosen_matakuliah','dosen_matakuliahcontroller@awal');
Route::get('dosen_matakuliah/tambah','dosen_matakuliahcontroller@tambah');
Route::get('dosen_matakuliah/{dosen_matakuliah}','dosen_matakuliahcontroller@lihat');
Route::post('dosen_matakuliah/simpan','dosen_matakuliahcontroller@simpan');
Route::get('dosen_matakuliah/edit/{dosen_matakuliah}','dosen_matakuliahcontroller@edit');
Route::post('dosen_matakuliah/edit/{dosen_matakuliah}','dosen_matakuliahcontroller@update');
Route::get('dosen_matakuliah/hapus/{dosen_matakuliah}','dosen_matakuliahcontroller@hapus');

Route::get('jadwal_matakuliah','jadwal_matakuliahcontroller@awal');
Route::get('jadwal_matakuliah/tambah','jadwal_matakuliahcontroller@tambah');
Route::get('jadwal_matakuliah/{jadwal_matakuliah}','jadwal_matakuliahcontroller@lihat');
Route::post('jadwal_matakuliah/simpan','jadwal_matakuliahcontroller@simpan');
Route::get('jadwal_matakuliah/edit/{jadwal_matakuliah}','jadwal_matakuliahcontroller@edit');
Route::post('jadwal_matakuliah/edit/{jadwal_matakuliah}','jadwal_matakuliahcontroller@update');
Route::get('jadwal_matakuliah/hapus/{jadwal_matakuliah}','jadwal_matakuliahcontroller@hapus');

Route::get('ujiHas','RelationshipRebornController@ujiHas');
Route::get('ujiDoesntHave','RelationshipRebornController@ujiDoesntHave');
Route::get('/',function()
	{
		return \App\dosen_matakuliah::whereHas('dosen',function($query)
		{
			$query->where('nama','like','%s%');
		})->with('dosen')->groupBy('dosen_id')->get();
	});
Route::get('/',function()
	{
		return \App\dosen_matakuliah::whereHas('dosen',function($query)
		{
			$query->where('nama','like','%s%');
		})
		->orWhereHas('matakuliah',function ($kuery)
		{
			$kuery->where('title','like','%a%');
		})
		->with('dosen','matakuliah')
		->groupBy('dosen_id')
		->get();
	});

Route::get('/',function (Illuminate\Http\Request $request)
{
	echo "ini adalah request dari method get". $request->nama;
});

use Illuminate\Http\Request;
Route::get('/',function ()
{
	echo Form::open(['url'=>'/']).
	Form::label('nama').
	Form::text('nama',null).
	Form::submit('kirim').
	Form::close();
});
Route::post('/',function (Request $request)
{
	echo "Hasil dari form input tadi nama : ".$request->nama;
});