@extends('template')
@section('konten')
<hr>
<h3>Materi Mata Pelajaran <b> <?php echo $mapel['nama_mapel']; ?></b></h3>
<?php 
// echo "<pre>";
// print_r($mengajar);
// echo "</pre>";
 ?>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="table">
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
							<td><?php echo $value["nama_materi"]; ?></td>
							<td>
								<a href="<?php echo url('assets/file/'.$value['file_materi']); ?>"><?php echo $value['file_materi'] ?></a>
							</td>
							<td>
								<a href="<?php echo url('siswa/'.$value['id_materi'].'/tugas') ?>" class="btn btn-sm btn-primary">Tugas</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection