@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">DATA SISWA</div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Nis</th>
					<th>Nisn</th>
					<th>Jurusan</th>
					<th>Aksi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($siswa as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama_siswa"]; ?></td>
						<td><?php echo $value["nis_siswa"]; ?></td>
						<td><?php echo $value["nisn_siswa"]; ?></td>
						<td><?php echo $value["nama_jurusan"]; ?></td>
						<td>
							<a href="<?php echo url('siswa/'.$value['id_siswa'].'/siswakelas'); ?>" class="btn-sm btn btn-info text-white">Tampil Siswa kelas</a>
							
							<a href="<?php echo url('siswa/'.$value['id_siswa'].'/detailsiswa'); ?>" class="btn-sm btn btn-info text-white">Detail</a>

							<a href="<?php echo url('siswa/'.$value['id_siswa'].'/edit'); ?>" class="btn-sm btn btn-warning text-white">Ubah</a>
							<form method="post" action="<?php echo url('siswa/'.$value['id_siswa']); ?>" class="d-inline" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger btn-sm">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('siswa/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection