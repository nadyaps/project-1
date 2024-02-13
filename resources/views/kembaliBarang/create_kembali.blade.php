@extends('dashboard')
@section('user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
<div class="row">
</div>
<div class="row profile-body"> 
  <div class="col-md-12 col-xl-12 center-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4>Pengembalian Barang</h4>
        </div>
        <form method="POST" action="{{route('store.kembali.barang')}}" class="forms-sample" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="form-group mb-3">
          <label for="id_barang">Nama Barang</label>
          <select name="id_barang" id="id_barang" class="form-control">
              @foreach ($data as $barang)
                @if ($barang->jumlah_pinjam != 0 && $barang->status == 'approved')
                  <option value="{{ $barang->id }}">{{ $barang->barang->nama_barang }} <span>{{ $barang->jumlah_pinjam }}</span></option>
                @endif
              @endforeach
          </select>
        </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Quantity</label>
            <div class="col-sm-9">
              <input type="number" name="jumlah_kembali" class="form-control @error('jumlah_kembali') is-invalid @enderror" placeholder="Masukkan jumlah barang">
              @error('jumlah_kembali')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tanggal Dikembalikan</label>
            <div class="col-sm-9">
              <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" placeholder="Masukkan tanggal dipinjam">
              @error('tanggal_kembali')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
              <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi" rows="5"></textarea>
              @error('deskripsi')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row mb-5">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="file" name="photo_kembalibarang" class="form-control @error('photo_kembalibarang') is-invalid @enderror" id="image">
              @error('photo_kembalibarang')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ route('kembali.barang') }}" class="btn btn-outline-secondary">Batal</a>
          </div>  
        </form>
      </div>     
    </div>
  </div>
</div>

@endsection