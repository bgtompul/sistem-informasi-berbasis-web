@extends('template')
@section('konten')
<hr>
<h3>Mata Pelajaran Kelas <b><?php echo $kelas["nama_kelas"]; ?></b> Tahun Ajaran <b><?php echo $kelas["tahun_ajaran"]; ?></b></h3>
<?php 
// echo "<pre>";
// print_r($mengajar);
// echo "</pre>";
 ?>
<div class="row">
	<div class="col-md-6">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Mapel</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($mengajar as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_mapel"]; ?></td>
							<td>
								<a href="<?php echo url('siswa/'.$value['id_mapel'].'/materi') ?>" class="btn-sm btn btn-primary">Materi</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection