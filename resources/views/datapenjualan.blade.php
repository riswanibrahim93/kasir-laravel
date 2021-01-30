@extends('layout/main')

@section('title', 'Admin | Data penjualan')
@section('container')
	<div class="container"><br>
	<div style="text-align: center;">
		<h2>Data Penjualan</h2>
		<h4><small><?php echo date('l, d M Y') ?></small></h4>
	</div>
	<br><br>
	<table class="table">
		<tr>
			<td>Total Penjualan</td>
			<td>
			</td>
		</tr>
	</table>
	<br><br>
	<table  class="table">
		<tr class="thead-dark">
			<th>No</th>
			<th>Kode</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Tanggal</th>
		</tr>

		@foreach($penjualan as $p)
		<tr>
			<td>{{ $loop->iteration }}</td>
			<td>{{ $p->kode }}</td>
			<td>{{ $p->nama }}</td>
			<td>{{ $p->jumlah }}</td>
			<td>{{ $p->harga }}</td>
			<td>{{ $p->tanggal }}</td>

		</tr>
		@endforeach

	</table>
	</div>
@endsection