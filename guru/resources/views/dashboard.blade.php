@extends('template')
@section('konten')

<p>
	Selamat datang <b><?php echo session("nama_guru"); ?></b> <br>
	Pada panel ini anda dapat melihat data mengajar , menginput materi , menginput tugas , serta melihat tugas yang di upload oleh siswa.
</p>
<hr>
<h3>Tahun Ajaran</h3>
<div class="row">
	<div class="col-md-8">
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
					<?php foreach ($tahun as $key => $value): ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><?php echo $value["tahun_ajaran"]; ?></td>
							<td>
								<a href="<?php echo url("guru/".$value['id_tahun']."/tahun"); ?>" class="btn-sm btn btn-primary">Mengajar</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection