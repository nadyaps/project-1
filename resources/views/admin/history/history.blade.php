@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-2">
          <h4 class="mb-4">History Barang</h4>
        </div>
        <form action="{{ route('searchbarang') }}" method="GET">
          <div class="input-group">
            <div class="input-group-text">
              <i data-feather="search"></i>
            </div>
            <input type="text" class="form-control " id="search-input" name="search" placeholder="Search">
          </div>
        </form>
        <div class="mt-4 card d-flex flex-row">
        @foreach($barang as $item)
            <div class="card-body">
              <h4 class="mb-4">Detail Barang</h4>
              <p class="card-text mb-2">Id barang: {{$item->id_barang}}</p>
              <p class="card-text mb-2">Serial Number: {{$item->serial_number}}</p>
              <p class="card-text mb-2">Nama barang: {{$item->nama_barang}}</p>
              <p class="card-text mb-2">Jumlah barang yang tersedia: {{$item->jumlah_barang}}</p>
            </div>
          </div>
        @endforeach
          <div id="content">
            <ul class="timeline">
            @foreach($ambil as $item)
              <li class="event" data-date="{{$item->tanggal_ambil}}">
                <h3 class="title">Barang diambil</h3>
                <p>Barang diambil oleh: {{$item->user->name}}</p>
              </li>
            @endforeach
            @foreach($kembali as $item)  
              <li class="event" data-date="{{$item->tanggal_kembali}}">
                <h3 class="title">Barang dikembalikan</h3>
                <p>Barang dikembalikan oleh: {{$item->user->name}}</p>
              </li>
            @endforeach
            @foreach($pinjam as $item)
              <li class="event" data-date="{{$item->tanggal_pinjam}}">
                <h3 class="title">Barang dipinjam</h3>
                <p>Barang dipinjam oleh: {{$item->user->name}}</p>
              </li>
            @endforeach
            @foreach($tambah as $item)
              <li class="event" data-date="{{$item->tanggal_tambah}}">
                <h3 class="title">Barang ditambahkan</h3>
              </li>
            @endforeach
            @foreach($masuk as $item)
              <li class="event" data-date="{{$item->tanggal_masuk}}">
                <h3 class="title">Registrasi barang</h3>
              </li>
            @endforeach
            </ul>
          </div> 
      </div>
    </div>
  </div>
</div>
@endsection