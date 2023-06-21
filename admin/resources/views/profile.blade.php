@extends('template')
@section('konten')

<h3>Profile</h3>
<hr>
<div class="row">
	<div class="col-md-4">
		<img src="<?php echo url('assets/file/'.session("foto_admin")) ?>" class="img-fluid rounded">
	</div>
	
	<div class="col-md-4">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('admin/profile') ?>">
			@csrf
			@method('put')
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" name="username_admin" value="<?php echo session('username_admin') ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="password_admin">
				<i class="text-muted">*kosongkan jika ingin mengganti password</i>
			</div>

			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama_admin" value="<?php echo session('nama_admin') ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" name="foto_admin" class="form-control">
			</div>

			<div class="mb3">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
</div>

@endsection