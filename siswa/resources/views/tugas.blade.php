@extends('template')
@section('konten')
<hr>
<h3>TUGAS</h3>
<?php 
// echo "<pre>";
// print_r($mengajar);
// echo "</pre>";
?>
<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Tugas</th>
						<th>File Tugas</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tugas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_tugas"]; ?></td>
							<td>
								<a href=""><?php echo $value['file_tugas'] ?></a>
							</td>
							<td>
								<a href="<?php echo url('siswa/'.$value['id_tugas'].'/'.$value['id_materi'].'/kumpul_tugas') ?>" class="btn btn-sm btn-primary" >Kumpul Tugas</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection