@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3 text-uppercase">TAMPIL DATA GURU MENGAJAR - <?php echo $guru['nama_guru'] ?></div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Tahun Ajaran</th>
					<th>Mata Pelajaran</th>
					<th>Kelas</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($mengajar as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["tahun_ajaran"]; ?></td>
						<td><?php echo $value["nama_mapel"]; ?></td>
						<td><?php echo $value["nama_kelas"]; ?></td>
						<td><?php echo $value["nama_jurusan"]; ?></td>

						<td nowrap="nowrap">
							<a href="<?php echo url('guru/mengajar/'.$value['id_mengajar'].'/'.$guru['id_guru'].'/edit'); ?>" class="btn-sm btn btn-warning text-white">Ubah</a>

							

							<form method="post" action="<?php echo url('guru/'.$value['id_mengajar'].'/'.$guru['id_guru'].'/mengajar'); ?>" class="d-inline" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger btn-sm">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('guru/mengajar/'.$guru['id_guru'].'/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection