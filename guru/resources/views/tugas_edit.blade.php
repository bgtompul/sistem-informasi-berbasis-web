@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">TAMBAH EDIT</div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('guru/'.$tugas['id_tugas'].'/'.$materi['id_materi'].'/tugas_ubah') ?>">
			@csrf
			@method('put')
			<div class="mb-3">
				<label class="form-label">Materi</label>
				<select class="form-control" name="id_materi" required>
					<option value="<?php echo $materi['id_materi'] ?>"><?php echo $materi['nama_materi'] ?></option>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label">Nama Tugas</label>
				<input type="text" name="nama_tugas" class="form-control" value="<?php echo $tugas['nama_tugas'] ?>"  required>
			</div>

			<div class="mb-3">
				<label class="form-label">File</label>
				<input type="file" name="file_tugas" class="form-control" >
			</div>

			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>

		</form>
	</div>
	
</div>

@endsection