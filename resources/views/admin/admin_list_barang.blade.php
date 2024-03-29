@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<div class="row">
  <div class="">
    <div class="card ">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4">
          <h6 class="card-title mb-0">List Data Barang</h6>
        </div>
        <form class="row justify-content-between" action="{{route('filter.list_barang')}}" method="get">
          <div class="col-md-4 mb-5">
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <select name="keterangan" id="keterangan" class="form-control">
                <option value="">Semua</option>
                <option value="ada">Ada</option>
                <option value="dipinjam">Dipinjam</option>
                <option value="diambil">Diambil</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="search">Search</label>
              <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th class="pt-0">Id Barang</th>
                <th class="pt-0">Serial Number</th>
                <th class="pt-0">Nama Barang</th>
                <th class="pt-0">Jenis Barang</th>
                <th class="pt-0">Quantity</th>
                <th class="pt-0">Keterangan</th> 
                <th  class="pt-0">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($barang as $item2)
              <tr>
                <td>{{$item2->id_barang}}</td>
                <td>{{$item2->serial_number}}</td>
                <td>{{$item2->nama_barang}}</td>
                <td>{{$item2->jenis_barang}}</td>
                <td>{{ $item2->jumlah_barang}}</td>
                <td>   
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Ada</label>
                  </span>
                </td>
                <td>
                <a href="{{route ('view.list_barang', ['id' => $item2->id])}}" type="button" class="btn btn-primary btn-icon">
                  <i data-feather="eye"></i>
                </a>
              </tr>
              @endforeach
              @foreach ($pinjambarang as $item1)
              @if($item1->jumlah_pinjam != 0)
              <tr>
                <td>{{$item1->barang->id_barang}}</td>
                <td>{{$item1->barang->serial_number}}</td>
                <td>{{$item1->barang->nama_barang}}</td>
                <td>{{$item1->barang->jenis_barang}}</td>
                <td>{{ $item1->jumlah_pinjam}}</td>
                <td>
                <span  type="text" class="text-white bg-warning p-2">
                    <label for="">Pinjam</label>
                  </span>
                </td>
                <td>
                <a href="{{route ('view.peminjaman', ['id' => $item1->id])}}" type="button" class="btn btn-primary btn-icon">
                  <i data-feather="eye"></i>
                </a>
                </td>  
              </tr>
              @endif
              @endforeach
              @foreach ($ambilbarang as $item4)
              <tr>
                <td>{{$item4->barang->id_barang}}</td>
                <td>{{$item4->barang->serial_number}}</td>
                <td>{{$item4->barang->nama_barang}}</td>
                <td>{{$item4->barang->jenis_barang}}</td>
                <td>{{ $item4->jumlah_ambil}}</td>
                <td>
                <span  type="text" class="text-white bg-danger p-2">
                    <label for="">Ambil</label>
                  </span>
                </td>
                <td>
                <a href="{{route ('view.pengambilan', ['id' => $item4->id])}}" type="button" class="btn btn-primary btn-icon">
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
</div> <!-- row -->

</div>


@endsection