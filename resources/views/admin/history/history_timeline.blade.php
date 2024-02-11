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
          <div class="card d-flex flex-row">
            <img src="{{ asset('../assets/images/kelinci.png') }}" class="card-img-top" alt="image">
            <div class="card-body">
              <h3 class="mb-3 ">Tv</h3>
              <p class="card-text">Jumlah barang yang tersedia: 5</p>
            </div>
          </div>
          <div id="content">
            <ul class="timeline">
              <li class="event" data-date="2021-6-20">
                <h3 class="title">Barang diambil</h3>
              </li>
              <li class="event" data-date="2021-6-18">
                <h3 class="title">Barang dikembalikan</h3>
              </li>
              <li class="event" data-date="2021-3-23">
                <h3 class="title">Barang dipinjam</h3>
              </li>
              <li class="event" data-date="2021-2-20">
                <h3 class="title">Barang ditambahkan</h3>
              </li>
              <li class="event" data-date="2021-2-19">
                <h3 class="title">Registrasi barang</h3>
              </li>
            </ul>
          </div>          
        </div>
    </div>
  </div>
</div>
</div>

@endsection