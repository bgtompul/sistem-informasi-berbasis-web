@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">Data Tahun Ajaran</div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Tahun Ajaran</th>
					<th>Aksi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tahun_ajaran as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["tahun_ajaran"]; ?></td>
						<td>
							<a href="<?php echo url('tahun_ajaran/'.$value['id_tahun'].'/edit') ?>" class="btn btn-warning">Edit</a>
							<form method="post" class="d-inline" action="<?php echo url('tahun_ajaran/'.$value['id_tahun']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('tahun_ajaran/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection