@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Pengembalian Barang</h4>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Nama Barang</th>
                <th>Tanggal Pengembalian</th>
                <th>Quantity</th>
                <th>Peminjam</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach( $kembali as $item )  
              <tr>
                <td>{{$item->barang->barang->id_barang}}</td>
                <td>{{$item->barang->barang->nama_barang}}</td>
                <td>{{$item->tanggal_kembali}}</td>
                <td>{{$item->jumlah_kembali}}</td>
                <td>{{$item->user->name}}</td>
                <td>
                @if($item->status == 'approved')
                <span type="text" class="text-white bg-success p-2">
                  <label for="">Approved</label>
                </span>
                @elseif($item->status == 'reject')
                <span type="text" class="text-white bg-danger p-2">
                  <label for="">Rejected</label>
                </span>
                @else
                  <a href="{{route('accept.kembali',  ['id' => $item->id])}}" class="btn btn-outline-primary btn-icon">
                    <i data-feather="check-square"></i>
                  </a>                  
                  <a href="{{route('reject.kembali',  ['id' => $item->id])}}" class="btn btn-outline-danger btn-icon">
                    <i data-feather="x"></i>
                  </a>  
                @endif
                </td>
                <td>
                  <a href="{{route ('view.pengembalian', ['id' => $item->id])}}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
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