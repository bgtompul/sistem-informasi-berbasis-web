@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">UBAH MATERI - <?php echo $mapel['nama_mapel'] ?> - <?php echo $materi['nama_materi'] ?></div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('guru/'.$mapel['id_mapel'].'/'.$materi['id_materi']) ?>">
			@csrf
			@method('put')
			<div class="mb-3">
				<label class="form-label">Mata Pelajaran</label>
				<select class="form-control" name="id_mapel" required>
					<option value="<?php echo $mapel['id_mapel'] ?>"><?php echo $mapel['nama_mapel'] ?></option>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label">Nama Materi</label>
				<input type="text" name="nama_materi" class="form-control" value="<?php echo $materi['nama_materi'] ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">File</label>
				<input type="file" name="file_materi" class="form-control" >
			</div>

			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>

		</form>
	</div>
	
</div>

@endsection