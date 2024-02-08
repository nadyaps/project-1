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
              <li class="event" data-date="12:30 - 1:00pm">
                <h3 class="title">Registration</h3>
                  <p>Get here on time, it's first come first serve. Be late, get turned away.</p>
              </li>
              <li class="event" data-date="2:30 - 4:00pm">
                <h3 class="title">Opening Ceremony</h3>
                  <p>Get ready for an exciting event, this will kick off in amazing fashion with MOP & Busta Rhymes as an opening show.</p>    
              </li>
            </ul>
          </div>
        </div>
    </div>
  </div>
</div>
</div>

@endsection