@extends('master')
@section('container')
<div class="panel panel-warning">
	<div class="panel-heading">
		<strong><a href="{{ url('dosen_matakuliah') }}"><i style="color:#8a6d3b" class=" fa text-default fa-chevron-left"></i></a> Detail Data jadwal Dosen</strong>
			</div>
			<table class="table">
				<tr>
						<td>Nama Mahasiswa</td>
						<td>:</td>
						<td>{{ $dosen_matakuliah->mahasiswa->nama }}</td>
				</tr>
				<tr>
						<td>Nip Mahasiswa</td>
						<td>:</td>
						<td>{{ $dosen_matakuliah->mahasiswa->nim }}</td>
				</tr>
				<tr>
						<td>Nama Dosen</td>
						<td>:</td>
						<td>{{ $dosen_matakuliah->dosen_matakuliah->dosen->nama }}</td>
				</tr>
				<tr>
						<td>Nip Dosen</td>
						<td>:</td>
						<td>{{ $dosen_matakuliah->dosen_matakuliah->dosen->nip }}</td>
				</tr>
				<tr>
						<td>Nama Matakuliah</td>
						<td>:</td>
						<td>{{ $dosen_matakuliah->dosen_matakuliah->matakuliah->title }}</td>
				</tr>
				<tr>
						<td class="col-xs-4">Dibuat tanggal</td>
						<td class="col-xs-1">:</td>
						<td>{{$dosen_matakuliah->created_at}}</td>
				</tr>
				<tr>
						<td class="col-xs-4">Diperbarui Tanggal</td>
						<td class="col-xs-1">:</td>
						<td>{{$dosen_matakuliah->updated_at}}</td>
				</tr>
		</table>
</div>
@stop