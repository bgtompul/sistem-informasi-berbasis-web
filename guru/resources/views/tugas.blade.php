@extends('template');
@section('konten')

<h4>Data Tugas <b><?php echo $materi['nama_materi']; ?></b> </h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Tugas</th>
						<th>File</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tugas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_tugas'] ?></td>
							<td>
								<?php $url = env('URL_ADMIN'); ?>
								<a href="<?php echo $url.'/assets/file/'.$value['file_tugas']; ?>"> 
									<?php echo $value['file_tugas']; ?> </a>
							</td>
							<td>
								<a href="<?php echo url('guru/'.$value['id_tugas'].'/tugas_siswa'); ?>" class='btn-sm btn btn-info text-white'>Tugas Siswa</a>
								<a href="<?php echo url('guru/'.$value['id_tugas'].'/'.$value['id_materi'].'/tugas_ubah/edit') ?>" class="btn-sm btn btn-warning" >Ubah</a>
								<form method="post" class="d-inline" action="<?php echo url('guru/'.$value['id_tugas'].'/'.$value['id_materi'].'/destroy') ?>" >
									@csrf
									@method('delete')
									<button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ?')" >Hapus</button>
								</form>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="<?php echo url('guru/'.$materi['id_materi'].'/tugas_tambah/create') ?>" class="btn btn-primary">Tambah</a>
		</div>
	</div>
</div>

@endsection