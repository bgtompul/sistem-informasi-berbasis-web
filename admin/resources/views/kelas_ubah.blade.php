@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">TAMBAH KELAS</div>
<div class="row">
	<div class="col-md-6">
		<form method="post" enctype="multipart/form-data" action="<?php echo url('kelas/'.$kelas['id_kelas']); ?>">
			@csrf
			@method('put')
			<div class="mb-3">
				<label class="form-label">Nama Kelas</label>
				<input type="text" class="form-control" name="nama_kelas" value="<?php echo $kelas['nama_kelas']; ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">Jurusan</label>
				<select class="form-control" name="id_jurusan" required>
					<option value="">--Pilih jurusan--</option>
					<?php foreach ($jurusan as $key => $value): ?>
						<option value="<?php echo $value["id_jurusan"]; ?>" <?php if($kelas['id_jurusan']==$value['id_jurusan']){echo"selected";}?>  >
							<?php echo $value["nama_jurusan"]; ?>
						</option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="mb-3">
				<label class="form-label">Tahun</label>
				<select class="form-control" name="id_tahun" required>
					<option value="">--Pilih tahun--</option>
					<?php foreach ($tahun_ajaran as $k => $v): ?>
						<option value="<?php echo $v["id_tahun"]; ?>" 
							<?php if ($kelas['id_tahun']==$v['id_tahun']) {echo'selected';} ?> >
							<?php echo $v["tahun_ajaran"]; ?>
							</option>
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