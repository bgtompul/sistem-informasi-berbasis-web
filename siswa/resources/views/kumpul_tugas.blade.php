@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">KUMPUL TUGAS</div>
<div class="row">
	<div class="col-md-6">
		<?php if (isset($tugas_siswa["file_tugas_siswa"])): ?>
			<form method="post" enctype="multipart/form-data" action="<?php echo url('siswa/'.$tugas['id_tugas']."/".$materi['id_materi'].'/'.$tugas_siswa['id_tugas_siswa']."/ubah_tugas"); ?>">
				@csrf
				@method('post')
				<div class="mb-3">
					<label class="form-label">Siswa / Kelas</label>
					<select required class="form-control" name="id_siswa_kelas">
						<option value="<?php echo $siswa_kelas["id_siswa_kelas"]; ?>"><?php echo $siswa_kelas["nama_siswa"] ?> / <?php echo $siswa_kelas["nama_kelas"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Tugas</label>
					<select class="form-control" name="id_tugas" required>
						<option value="<?php echo $tugas["id_tugas"]; ?>"><?php echo $tugas["nama_tugas"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">File Tugas</label>
					<br>
					<a href="<?php echo url("assets/file/".$tugas_siswa["file_tugas_siswa"]) ?>"><?php echo $tugas_siswa["file_tugas_siswa"]; ?></a>
					<input type="file" class="form-control mt-2" name="file_tugas" required>
				</div>
				<div class="mb-3">
					<button class="btn btn-primary">Simpan</button>
				</div>

			</form>
		<?php else: ?>
			<form method="post" enctype="multipart/form-data" action="<?php echo url('siswa/'.$tugas['id_tugas']."/".$materi['id_materi']."/kumpul"); ?>">
				@csrf
				@method('post')
				<div class="mb-3">
					<label class="form-label">Siswa / Kelas</label>
					<select required class="form-control" name="id_siswa_kelas">
						<option value="<?php echo $siswa_kelas["id_siswa_kelas"]; ?>"><?php echo $siswa_kelas["nama_siswa"] ?> / <?php echo $siswa_kelas["nama_kelas"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Tugas</label>
					<select class="form-control" name="id_tugas" required>
						<option value="<?php echo $tugas["id_tugas"]; ?>"><?php echo $tugas["nama_tugas"]; ?></option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">File Tugas</label>
					<input type="file" class="form-control mt-2" name="file_tugas" required>
				</div>
				<div class="mb-3">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
		<?php endif ?>

	</div>
	
</div>


@endsection