@extends('template');
@section('konten')

<h4>Data Mata Pelajaran <b><?php echo $mapel['nama_mapel']; ?></b> Jurusan <b><?php echo $mapel['nama_jurusan'] ?></b></h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Materi</th>
						<th>File</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($materi as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_materi'] ?></td>
							<td>
								<?php $url=env('URL_ADMIN') ?>
								<a href="<?php echo $url.'/assets/file/'.$value['file_materi']; ?>"><?php echo $value['file_materi'] ?></a>
							</td>
							<td>
								<a href="<?php echo url('guru/'.$value['id_materi'].'/tugas_materi') ?>" class='btn-sm btn btn-info' >Tugas</a>
								<a href="<?php echo url('guru/'.$mapel['id_mapel'].'/'.$value['id_materi'].'/ubah') ?>" class="btn-sm btn btn-warning">Ubah</a>
								<form method="post" action="<?php echo url('guru/'.$mapel['id_mapel'].'/'.$value['id_materi']) ?>" class="d-inline">
									@csrf
									@method('delete')
									<button class="btn btn-sm btn-danger">Hapus</button>
								</form>
							</td>
						</tr>
					<?php endforeach ?>	
				</tbody>
			</table>
			<a href="<?php echo url('guru/'.$mapel['id_mapel'].'/materi/create') ?>" class="btn btn-primary">Tambah</a>
		</div>
	</div>
</div>

@endsection