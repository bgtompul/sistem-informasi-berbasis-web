@extends('template')
@section('konten')
<div class="card-header bg-dark text-white fw-bold mb-3 text-uppercase">DATA siswa KELAS - <?php echo $siswa['nama_siswa'] ?></div>
<div class="table-responsive">
		<table class="table table-bordered table-hover" id="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Nama Kelas</th>
					<th>Tahun Ajaran</th>
					<th>Aksi</th>
					
				</tr>
			</thead>
			<tbody>
				<?php 
				// echo'<pre>';
				// print_r($siswakelas);
				// echo'</pre>';
				 ?>
				<?php foreach ($siswakelas as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $siswa["nama_siswa"]; ?></td>
						<td><?php echo $value["nama_kelas"]; ?></td>
						<td><?php echo $value["tahun_ajaran"]; ?></td>
						
						<td>
							<a href="<?php echo url('siswa/'.$value['id_siswa_kelas'].'/'.$siswa['id_siswa'].'/edit'); ?>" class="btn-sm btn btn-warning text-white">Ubah</a>

							<form method="post" action="<?php echo url('siswa/'.$value['id_siswa_kelas'].'/'.$value['id_siswa'].'/siswakelas'); ?>" class="d-inline" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
								@csrf
								@method('delete')
								<button class="btn btn-danger btn-sm">Hapus</button>
							</form>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="<?php echo url('siswa/siswakelas/'.$siswa['id_siswa'].'/create') ?>" class='btn btn-primary'>Tambah</a>
	</div>
@endsection