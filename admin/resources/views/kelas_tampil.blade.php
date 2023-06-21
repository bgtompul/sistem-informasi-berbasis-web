@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">Data Kelas</div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kelas</th>
					<th>Jurusan</th>
					<th>Tahun</th>
					<th>Aksi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($kelas as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama_kelas"]; ?></td>
						<td><?php echo $value["nama_jurusan"]; ?></td>
						<td><?php echo $value["tahun_ajaran"]; ?></td>
						<td>
							<a href="<?php echo url('kelas/'.$value['id_kelas'].'/siswakelas') ?>" class="btn btn-info text-white" >Siswa Kelas</a>
							<a href="<?php echo url('kelas/'.$value['id_kelas'].'/edit') ?>" class="btn btn-warning">Edit</a>
							<form method="post" class="d-inline" action="<?php echo url('kelas/'.$value['id_kelas']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('kelas/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection