@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">List Barang</h4>
        </div>
    
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Serial Number</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>         
              <tr>
              @foreach($masukbarang as $item)
                <td>{{$item->id_barang}}</td>
                <td>{{$item->serial_number}}</td>
                <td>{{$item->nama_barang}}</td>
                <td>{{$item->jumlah_barang}}</td>
                <td>
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Ada</label>
                  </span>
                </td>
                <td>
                  <a href="{{route('view.list_barang', ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                </td>
              </tr>
              @endforeach
              @foreach($keluarbarang as $item)
              <tr>
                <td>{{$item->barang->id_barang}}</td>
                <td>{{$item->barang->serial_number}}</td>
                <td>{{$item->barang->nama_barang}}</td>
                <td>{{$item->jumlah_pinjam}}</td>
                <td>
                  <span type="text" class="text-white bg-warning p-2">
                    <label for="">Dipinjam</label>
                  </span>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

</div>


@endsection