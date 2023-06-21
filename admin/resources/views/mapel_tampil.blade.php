@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">Data Mapel</div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Mapel</th>
					<th>Jurusan</th>
					<th>Aksi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($mapel as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama_mapel"]; ?></td>
						<td><?php echo $value["nama_jurusan"]; ?></td>
						
						<td>
							<a href="<?php echo url('mapel/'.$value['id_mapel'].'/edit') ?>" class="btn btn-warning">Edit</a>
							<form method="post" class="d-inline" action="<?php echo url('mapel/'.$value['id_mapel']) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('mapel/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection