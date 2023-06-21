@extends('template')
@section('konten')
<h3> Profile Guru</h3>
<hr>
<div class="row">
	<div class="col-md-4">
		<?php $url = env('URL_ADMIN') ?>
	<img src=" <?php echo $url ?>/assets/file/<?php  echo session('foto_guru'); ?> " class='img-fluid rounded'>
</div>
<div class="col-md-4">
	<form method="post" enctype="multipart/form-data" action="<?php echo url('guru/profile') ?>">
		@csrf
		@method('put')

		<div>
			<label class="form-label">Username</label>
			<input type="text" name="username_guru" class="form-control" value='<?php echo session('username_guru') ?>' required >
		</div>

		<div>
			<label class="form-label">Password</label>
			<input type="password" name="password_guru" class="form-control" >
			<i class="text-muted">*Kosongkan jika tidak di ganti</i>
		</div>

		<div>
			<label class="form-label">Nama Guru</label>
			<input type="text" name="nama_guru" class="form-control" value="<?php echo session('nama_guru') ?>">
		</div>

		<div>
			<label class="form-label">Foto</label>
			<input type="file" name="foto_guru" class="form-control">
		</div>

		<div>
			<button class="btn btn-primary">Simpan</button>
		</div>


	</form>
</div>
</div>


@endsection