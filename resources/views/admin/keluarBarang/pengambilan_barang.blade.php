@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Pengambilan Barang</h4>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Serial Number</th>
                <th>Tanggal Pengambilan</th>
                <th>Nama Barang</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>123456</td>
                <td>12-12-2021</td>
                <td>Keyboard</td>
                <td>John Doe</td>
                <td>
                  <a href="" class="btn btn-outline-primary btn-icon">
                    <i data-feather="check-square"></i>
                  </a>                  
                  <a href="" class="btn btn-outline-danger btn-icon">
                    <i data-feather="x"></i>
                  </a>  
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-icon">
                    <i data-feather="trash-2"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>678910</td>
                <td>11-04-2006</td>
                <td>Lemari</td>
                <td>Lili</td>
                <td>
                  <span type="text" class="text-white bg-danger p-2">
                    <label for="">Ditolak</label>
                  </span>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-icon">
                    <i data-feather="trash-2"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>678910</td>
                <td>11-04-2006</td>
                <td>Lemari</td>
                <td>Lili</td>
                <td>
                  <span type="text" class="text-white bg-success p-2">
                    <label for="">Disetujui</label>
                  </span>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-icon">
                    <i data-feather="trash-2"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

</div>


@endsection