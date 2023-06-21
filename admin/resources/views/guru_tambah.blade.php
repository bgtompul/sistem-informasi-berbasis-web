@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">DATA GURU</div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('guru') ?>">
			@csrf
			@method('post')
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" name="username_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="password_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Nip</label>
				<input type="text" class="form-control" name="nip_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Jenis Kelamin</label>
				<select class="form-control" name="jk_guru" required>
					<option value="">--Pilih Gender--</option>
					<option value="laki_laki">laki-laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label">No hp </label>
				<input type="text" class="form-control" name="hp_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat_guru" required></textarea>
			</div>

			<div class="mb-3">
				<label class="form-label">Email</label>
				<input type="Email" class="form-control" name="email_guru" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto_guru" required>
			</div>

			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>

		</form>
	</div>
	
</div>

@endsection