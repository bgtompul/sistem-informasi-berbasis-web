@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3">DATA GURU</div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>Username</th>
					<th>Nip</th>
					<th>Jenis Kelamin</th>
					<th>No HP</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Foto</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($guru as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama_guru"]; ?></td>
						<td><?php echo $value["username_guru"]; ?></td>
						<td><?php echo $value["nip_guru"]; ?></td>
						<td><?php echo $value["jk_guru"]; ?></td>
						<td><?php echo $value["hp_guru"]; ?></td>
						<td><?php echo $value["email_guru"]; ?></td>
						<td><?php echo $value["alamat_guru"]; ?></td>
						<td>
							<img src="<?php echo url("assets/file/".$value["foto_guru"]); ?>" width="70">
						</td>

						<td nowrap="nowrap">
							<a href="<?php echo url('guru/'.$value['id_guru'].'/mengajar') ?>" class="btn-sm btn btn-info text-white">Mengajar</a>


							<a href="<?php echo url('guru/'.$value['id_guru'].'/edit'); ?>" class="btn-sm btn btn-warning text-white">Ubah</a>

							

							<form method="post" action="<?php echo url('guru/'.$value['id_guru']); ?>" class="d-inline" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger btn-sm">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('guru/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection