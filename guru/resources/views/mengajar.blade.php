@extends('template');
@section('konten')

<h4>Data Mengajar Tahun Ajaran <b><?php echo $tahun['tahun_ajaran']; ?></b> </h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Mata Pelajaran</th>
						<th>Jurusan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($mengajar as $key => $value): ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo $value['nama_kelas'] ?></td>
							<td><?php echo $value['nama_mapel'] ?></td>
							<td><?php echo $value['nama_jurusan'] ?></td>
							<td>
								<a href="<?php echo url('guru/'.$value['id_mapel'].'/materi') ?>" class='btn-sm btn btn-info text-white'>Materi</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection