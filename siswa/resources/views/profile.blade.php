@extends('template')
@section('konten')
<h3> Profile Siswa</h3>
<hr>
<div class="row">
	<div class="col-md-4">
	<img src="<?php echo url('assets/file/'.session('foto_siswa')) ?>" class='img-fluid rounded'>
</div>
<div class="col-md-4">
	<form method="post" enctype="multipart/form-data" action="<?php echo url('siswa/profile') ?>">
		@csrf
		@method('put')

		<div>
			<label class="form-label">Username</label>
			<input type="text" name="username_siswa" class="form-control" value='<?php echo session('username_siswa') ?>' required >
		</div>

		<div>
			<label class="form-label">Password</label>
			<input type="password" name="password_siswa" class="form-control" >
			<i class="text-muted">*Kosongkan jika tidak di ganti</i>
		</div>

		<div>
			<label class="form-label">Nama Siswa</label>
			<input type="text" name="nama_siswa" class="form-control" value="<?php echo session('nama_siswa') ?>">
		</div>

		<div>
			<label class="form-label">Foto</label>
			<input type="file" name="foto_siswa" class="form-control">
		</div>

		<div>
			<button class="btn btn-primary">Simpan</button>
		</div>


	</form>
</div>
</div>


@endsection