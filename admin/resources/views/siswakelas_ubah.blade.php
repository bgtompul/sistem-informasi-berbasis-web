@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3 text-uppercase">UBAH siswa kelas - <?php echo $siswa['nama_siswa'] ?></div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url("siswa/".$siswakelas['id_siswa_kelas'].'/'.$siswa['id_siswa']); ?>">
			@csrf
			@method('put')
			
			<?php 
			// echo'<pre>';
			// print_r($siswakelas);
			// echo'</pre>';
			?>

			<div class="mb-3">
				<label class="form-label">Nama Siswa</label>
				<select class="form-control" name='id_siswa'>
					<option value="<?php echo $siswa['id_siswa'] ?>" ><?php echo $siswa['nama_siswa'] ?></option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Nama Kelas</label>
				<select class="form-control" name="id_kelas">
					<option>--Pilih Kelas--</option>
					<?php foreach ($kelas as $kk => $vk): ?>
						<option value="<?php echo $vk['id_kelas'] ?>" <?php if ($vk['id_kelas']==$siswakelas['id_kelas']){echo('selected');} ?>
						
						><?php echo $vk['nama_kelas'] ?></option>

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