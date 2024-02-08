<!DOCTYPE html>
<html lang="en">
<head>

	<title>Dashboard</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
	<!-- End plugin css for this page -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('../assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="profile" href="{{ asset('../assets/images/kelinci.png') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
     
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
    @include('layouts.sidebar')
		<!-- partial -->
	
		<div class="page-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('layouts.navbar')
        <!-- partial -->
	
      @yield('user')

			<!-- partial:partials/_footer.html -->
      @include('layouts.footer')
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('../assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('../assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('../assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('../assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('../assets/js/template.js') }}"></script>
	<!-- endinject -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;

      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;

      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;

      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
  }
  @endif 
  </script>

  	<!-- Start data table -->
    <script src="{{ asset('../../../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('../../../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('../../../assets/js/data-table.js') }}"></script>
    <!-- End data table -->


</body>
</html>    