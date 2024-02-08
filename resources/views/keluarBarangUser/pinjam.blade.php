@extends('Dashboard')
@section('user')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Peminjaman Barang</h4>
          <a href="" class="btn btn-outline-primary btn-icon-text">
            <i data-feather="plus" class="btn-icon-prepend"></i> Tambah 
          </a>
        </div>
    
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Tanggal Peminjaman</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Keterangan</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>         
              <tr>
                <td>1</td>
                <td>20-03-2014</td>
                <td>Tv</td>
                <td>3</td>
                <td>STO Panakukang</td>
                <td>
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Permintaan disetujui</label>
                  </span>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>20-03-2014</td>
                <td>Lemari</td>
                <td>4</td>
                <td>STO Panakukang</td>
                <td>
                  <span type="text" class="text-white bg-warning p-2">
                    <label for="">Menunggu konfirmasi</label>
                  </span>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>20-03-2014</td>
                <td>Buku</td>
                <td>9</td>
                <td>STO Panakukang</td>
                <td>
                  <span type="text" class="text-white bg-danger p-2">
                    <label for="">Permintaan Ditolak</label>
                  </span>
                </td>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

</div>


@endsection