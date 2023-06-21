@extends('template')
@section('konten')

<div class="card-header bg-dark text-white fw-bold mb-3 text-uppercase">DATA <?php echo $siswa['nama_siswa']; ?></div>

<div class="row">
	<div class="col-md-4">
		<img src="<?php echo url('assets/file/'.$siswa['foto_siswa']); ?>" class='img-fluid rounded mb-3'>
	</div>
	<div class="col-md-6 offset-md-1">
		<h4>Detail Siswa</h4>
		<hr>
		<table class="table">
			<tr>
				<th>Nama</th>
				<td>: <?php echo $siswa['nama_siswa'] ?></td>
			</tr>
			<tr>
				<th>Nis</th>
				<td>: <?php echo $siswa['nis_siswa'] ?></td>
			</tr>
			<tr>
				<th>Nisn</th>
				<td>: <?php echo $siswa['nisn_siswa'] ?></td>
			</tr>
			<tr>
				<th>Jurusan</th>
				<td>: <?php echo $siswa['nama_jurusan'] ?></td>
			</tr>
			<tr>
				<th>Jenis Kelamin</th>
				<td>: <?php echo $siswa['jk_siswa'] ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td>: <?php echo $siswa['alamat_siswa'] ?></td>
			</tr>
			<tr>
				<th>Username</th>
				<td>: <?php echo $siswa['username_siswa'] ?></td>
			</tr>

		</table>
	</div>
</div>
@endsection