@extends('template');
@section('konten')

<h4>Siswa Yang Sudah Mengumpulkan Tugas <b><?php echo $tugas['nama_tugas']; ?></b></h4>
<hr>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>File Tugas</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($tugas_siswa as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value['nama_siswa'] ?></td>
							<td><?php echo $value['nama_kelas'] ?></td>
							<td>
								<?php $url = ('URL_ADMIN') ?>
								<a href="<?php echo $url.'/assets/file/'.$value['file_tugas_siswa']; ?>"><?php echo $tugas['nama_tugas'] ?></a>
							</td>
						</tr>
					<?php endforeach ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection