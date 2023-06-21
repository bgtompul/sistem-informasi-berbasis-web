@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">UBAH SISWA</div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url("siswa/".$siswa['id_siswa']); ?>">
			@csrf
			@method('put')

			<div class="mb-3">
				<label class="form-label">Jurusan</label>
				<select class="form-control" name="id_jurusan" required>
					<option value="">--Pilih jurusan--</option>
					<?php foreach ($jurusan as $key => $value): ?>
						<option value="<?php echo $value["id_jurusan"]; ?>" 
							<?php if($siswa['id_jurusan']==$value['id_jurusan']){echo"selected";}?> 
							><?php echo $value["nama_jurusan"]; ?></option>
					<?php endforeach ?>
				</select>
			</div>
			
			<div class="mb-3">
				<label class="form-label">Username</label>
				<input type="text" class="form-control" name="username_siswa" required value="<?php echo $siswa['username_siswa'] ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" name="password_siswa">
				<i class="text-muted">*Kosongkan jika tidak mengubah password</i>
			</div>
			<div class="mb-3">
				<label class="form-label">Nama</label>
				<input type="text" class="form-control" name="nama_siswa" required value="<?php echo $siswa['nama_siswa'] ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Kelamin</label>
				<select class="form-control" name="jk_siswa" required >
					<option value="">--Pilih Gender--</option>
					<option value="laki_laki" <?php if($siswa['jk_siswa']=='laki_laki'){echo'selected';} ?>  >Laki laki</option>
					<option value="perempuan" <?php if($siswa['jk_siswa']=='perempuan'){echo'selected';} ?>  >Perempuan</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Nis</label>
				<input type="text" class="form-control" name="nis_siswa" required value="<?php echo $siswa['nis_siswa']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Nisn</label>
				<input type="text" class="form-control" name="nisn_siswa" required value="<?php echo $siswa['nisn_siswa']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Alamat</label>
				<textarea class="form-control" name="alamat_siswa" required><?php echo $siswa['alamat_siswa']; ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label">Foto</label>
				<input type="file" class="form-control" name="foto_siswa" >
			</div>

			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</form>
	</div>
	
	<div class="col-md-4 offset-md-1">
		<img src="<?php echo url('assets/file/'.$siswa['foto_siswa']); ?>" class="img-fluid rounded">
	</div>

</div>

@endsection