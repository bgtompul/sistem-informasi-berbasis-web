@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3 text-uppercase">Ubah Mengajar GURU - <?php echo $guru['nama_guru'] ?></div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('guru/mengajar/'.$mengajar['id_mengajar'].'/'.$guru['id_guru']); ?>">
			@csrf
			@method('put')
			<div class="mb-3">
				<label class="form-label">Guru</label>
				<select class="form-control" name="id_guru">
					<option value="<?php echo $guru['id_guru'] ?>" ><?php echo $guru['nama_guru'] ?></option>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label" >Mapel</label>
				<select class="form-control" name="id_mapel" >
				<option value="">--Pilih Mapel--</option>
				<?php foreach ($mapel as $key => $value): ?>
					<option value="<?php echo $value['id_mapel'] ?>" <?php if ($value['id_mapel']==$mengajar['id_mapel']) {echo('selected');
					} ?> ><?php echo $value['nama_mapel'] ?></option>
				<?php endforeach ?>
				</select>
			</div>
			
			<div class="mb-3">
				<label class="form-label" >Kelas</label>
				<select class="form-control" name="id_kelas" >
				<option value="">--Pilih Kelas--</option>
				<?php foreach ($kelas as $kk => $vk): ?>
					<option value="<?php echo $vk['id_kelas'] ?> " <?php if ($vk['id_kelas']==$mengajar['id_kelas']) {echo('selected');
					} ?> ><?php echo $vk['nama_kelas'] ?> | <?php echo $vk['tahun_ajaran'] ?></option>
				<?php endforeach ?>
				</select>
			</div>

			
			<div class="mb-3">
				<button class="btn btn-primary">Simpan</button>
			</div>

		</form>
	</div>
	
</div>

@endsection