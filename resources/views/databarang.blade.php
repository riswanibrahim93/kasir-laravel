@extends('layout/main')

@section('title', 'Admin | Data Barang')
@section('container')
	<div class="container">
		<br><br>
		<h3 align="center">Masukkan Item Baru</h3><br>
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	
		<form action="/databarang" method="POST">
			@csrf
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-10">
					<input type="input" class="form-control @error('kode') is-invalid @enderror" placeholder="scan barcode" name="kode" id="kode" autocomplete="off" value="{{ old('kode') }}">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="input" class="form-control @error('nama') is-invalid @enderror" placeholder="masukkan nama barang" name="nama" autocomplete="off" value="{{ old('nama') }}">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-10">
					<input type="input" class="form-control @error('harga') is-invalid @enderror" placeholder="masukkan harga barang" name="harga" autocomplete="off" value="{{ old('harga') }}">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Stok</label>
				<div class="col-sm-10">
					<input type="input" class="form-control @error('stok') is-invalid @enderror" placeholder="masukkan stok barang" name="stok" autocomplete="off" value="{{ old('stok') }}">
				</div>
			</div>
			<div align="right">
				<button class="btn btn-info" type="submit">Tambah</button>
				<button class="btn btn-danger" type="reset">Reset</button>
			</div>
		</form>
	@if (session('hapus'))
		<br>
	    <div class="alert alert-danger">
	        {{ session('hapus') }}
	    </div>
	@endif
	@if (session('update'))
		<br>
	    <div class="alert alert-info">
	        {{ session('update') }}
	    </div>
	@endif

		<div class="tb_barang" id="barang" >
			<br><br>
			<h3 align="center">Data Barang</h3><br>
			<table class="table table-striped">
				<tr class="bg-dark text-white">
					<td><b>No</b></td>
					<td><b>Kode</b></td>
					<td><b>Nama</b></td>
					<td><b>Stok</b></td>
					<td><b>Harga</b></td>
					<td><b>Hapus</b></td>
				</tr>
				@foreach($barang as $b)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $b->kode }}</td>
					<td>{{ $b->nama }}</td>
					<td>{{ $b->stok }}</td>
					<td>{{ $b->harga }}</td>
					<td>
						<!-- <a href="" class="btn btn-info">Ubah</a> -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $b->kode }}">
						  Ubah
						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal{{ $b->kode }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						      	<strong>
						        	<h5 class="modal-title" id="exampleModalLabel">Ubah data {{ $b->nama }}</h5>
						      	</strong>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      </div>
						      <div class="modal-body">
						        <form action="/databarang/{{ $b->kode }}" method="post">
									@method('put')
									@csrf
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Kode</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('kode') is-invalid @enderror" placeholder="scan barcode" name="kode" id="kode" autocomplete="off" value="{{ $b->kode }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Nama</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('nama') is-invalid @enderror" placeholder="masukkan nama barang" name="nama" autocomplete="off" value="{{ $b->nama }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Harga</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('harga') is-invalid @enderror" placeholder="masukkan harga barang" name="harga" autocomplete="off" value="{{ $b->harga }}">
										</div>
									</div>
									<div class="form-group row mb-2">
										<label class="col-sm-2 col-form-label">Stok</label>
										<div class="col-sm-10">
											<input type="input" class="form-control @error('stok') is-invalid @enderror" placeholder="masukkan stok barang" name="stok" autocomplete="off" value="{{ $b->stok }}">
										</div>
									</div>
									<div align="right">
										<button class="btn btn-info" type="submit">Ubah</button>
										<button class="btn btn-danger" type="reset">Reset</button>
									</div>
								</form>
						      </div>
						    </div>
						  </div>
						</div>

						<form action="databarang/{{ $b->kode }}" method="post" class="d-inline">
							@method('delete')
							@csrf
							<button type="submit"class="btn btn-danger">Hapus</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@endsection