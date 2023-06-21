@extends('template')
@section('konten')

<p>
	Selamat datang <b><?php echo session('nama_siswa')?></b> <br>
	Pada panel ini anda dapat melihat data siswa.
</p>
<hr>
<h3>Tahun Ajaran</h3>

<!--  echo "<pre>";
 print_r($kelas);
 echo "</pre>"; -->


<div class="row">
	<div class="col-md-8">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Tahun Ajaran</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kelas as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["nama_kelas"]; ?></td>
							<td><?php echo $value["tahun_ajaran"]; ?></td>
							<td>
								<a href="<?php echo url("siswa/".$value['id_kelas']."/mapel"); ?>" class="btn-sm btn btn-primary">Mata Pelajaran</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection