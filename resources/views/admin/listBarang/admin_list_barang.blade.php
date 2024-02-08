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
                <td>1</td>
                <td>1243</td>
                <td>Tv</td>
                <td>3</td>
                <td>
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Ada</label>
                  </span>
                </td>
                <td>
                  <a href="{{route('view.list_barang')}}" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>124355</td>
                <td>Lemari</td>
                <td>4</td>
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
              <tr>
                <td>3</td>
                <td>124355</td>
                <td>Buku</td>
                <td>9</td>
                <td>
                  <span type="text" class="text-white bg-danger p-2">
                    <label for="">Diambil</label>
                  </span>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </button>
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