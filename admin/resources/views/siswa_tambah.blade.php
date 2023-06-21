@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">TAMBAH SISWA</div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url("siswa/"); ?>">
			@csrf
			@method('post')

			<div class="mb-3">
				<label class="form-label">Jurusan</label>
				<select class="form-control" name="id_jurusan" required>
					<option value="">--Pilih jurusan--</option>
					<?php foreach ($jurusan as $key => $value): ?>
						<option value="<?php echo $value["id_jurusan"]; ?>"><?php echo $value["nama_jurusan"]; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" name="username_siswa" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="password_siswa" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama_siswa" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Kelamin</label>
				<select class="form-control" name="jk_siswa" required >
					<option value="">--Pilih Gender--</option>
					<option value="laki_laki">Laki laki</option>
					<option value="perempuan">Perempuan</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Nis</label>
				<input type="text" class="form-control" name="nis_siswa" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Nisn</label>
				<input type="text" class="form-control" name="nisn_siswa" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat_siswa" required></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto_siswa" required>
			</div>
			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
	
</div>

@endsection