@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-row align-items-center justify-content-between mb-3">
          <h4 class="mb-4">Tambah Barang</h4>
          <a href="{{ route('add.tambah') }}" class="btn btn-outline-primary btn-icon-text">
            <i data-feather="plus" class="btn-icon-prepend"></i> Tambah 
          </a>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Id Barang</th>
                <th>Serial Number</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <a href="" type="button" class="btn btn-primary btn-icon">
                    <i data-feather="eye"></i>
                  </a>
                  <a type="button" class="btn btn-secondary btn-icon" data-bs-toggle="modal" data-bs-target="#tambahEdit">
                    <i data-feather="edit"></i>
                  </a>
                  <a type="button" class="btn btn-danger btn-icon">
                    <i data-feather="trash-2"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
            <!-- Modal -->
          <div class="modal fade" id="tambahEdit" tabindex="-1" aria-labelledby="tambahEditLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="profileEditlLabel">Edit Barang</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>

                <form method="POST" action="" class="forms-sample" enctype="multipart/form-data">
                  @csrf
      
                <div class="modal-body">
                  <form class="forms-sample"> 
                    <div class="row mb-3">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Id Barang</label>
                      <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" id="exampleInputUsername2" value="">
                      </div>
                    </div>
                    <div class="row mb-1">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Serial Number</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" value="">
                      <div class="card mb-3 mt-3 col-sm-14">
                        <div class="card-header text-white bg-success">Data Barang</div>
                          <div class="card-body">
                            <h5 class="card-title">Nama Barang:</h5>
                            <p class="card-text">Jenis Barang:</p>
                            <p class="card-text">Jumlah Barang yang tersedia:</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Resi Pengiriman</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Owner</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Pengirim</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" autocomplete="off" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Quantity</label>
                      <div class="col-sm-9">
                        <input type="text" name="jumlah_barang" class="form-control" id="exampleInputMobile" value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                      <div class="col-sm-9">
                        <input type="date" name="tanggal_masuk" class="form-control" id="exampleInputEmail2" autocomplete="off" value="">
                      </div>
                  </form>
                 </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary rounded-lg" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </div>
            </div>
          </div>
</div> 
</div>

@endsection