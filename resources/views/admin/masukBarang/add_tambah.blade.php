@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form method="GET" action="{{ route('barang.search.tambah') }}" class="forms-sample" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
              <label for="id_barang" class="col-sm-3 col-form-label">ID Barang</label>
              <div class="col-sm-9">
                <input type="text" name="id_barang" class="form-control" placeholder="Masukkan ID Barang">
              </div>
            </div>
            <div class="row mb-3">
              <label for="serial_number" class="col-sm-3 col-form-label">Serial Number</label>
              <div class="col-sm-9">
                <input type="text" name="serial_number" class="form-control" placeholder="Masukkan Serial Number">
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-2 mb-3">Cari</button>
          </form>

          @if (session('success'))
            <div class="alert alert-success mt-3">
              {{ session('success') }}
            </div>
          @endif

          @if (session('error'))
            <div class="alert alert-danger mt-3">
              {{ session('error') }}
            </div>
          @endif

          @if (isset($barang))
            <form method="POST" action="{{ route('barang.tambah.quantity') }}" class="forms-sample" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">

              <div class="row mb-3">
                <label for="resi_pengiriman" class="col-sm-3 col-form-label">Resi Pengiriman</label>
                <div class="col-sm-9">
                  <input type="text" name="resi_pengiriman" class="form-control @error('resi_pengiriman') is-invalid @enderror" placeholder="Masukkan resi pengiriman" value="{{ old('resi_pengiriman') }}">
                  @error('resi_pengiriman')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="owner" class="col-sm-3 col-form-label">Owner</label>
                <div class="col-sm-9">
                  <input type="text" name="owner" class="form-control @error('owner') is-invalid @enderror" placeholder="Masukkan owner" value="{{ old('owner') }}">
                  @error('owner')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                <div class="col-sm-9">
                  <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror" placeholder="Masukkan pengirim" value="{{ old('pengirim') }}">
                  @error('pengirim')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="jumlah_barang" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                  <input type="number" name="jumlah_barang" class="form-control @error('jumlah_barang') is-invalid @enderror" placeholder="Masukkan jumlah barang" value="{{ old('jumlah_barang') }}">
                  @error('jumlah_barang')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="tanggal_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                <div class="col-sm-9">
                  <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') }}">
                  @error('tanggal_masuk')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary me-2">Simpan</button>
              <a href="{{route('tambah.barang')}}" type="submit" class="btn btn-outline-secondary me-2">Batal</a>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>



@endsection