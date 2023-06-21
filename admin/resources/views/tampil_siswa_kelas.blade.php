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
					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($siswakelas as $key => $value): ?>
					<tr>
						<td><?php echo $key+1; ?></td>
						<td><?php echo $value["nama_siswa"]; ?></td>
						<td><?php echo $value["nis_siswa"]; ?></td>
						<td><?php echo $value["nisn_siswa"]; ?></td>
						<td><?php echo $value["nama_jurusan"]; ?></td>
						
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		
	</div>
@endsection