@extends("vendor_panel.layouts.layout")
@section('title', '| Edit Journal')

@section("style")
<link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@endsection

@section("content")
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Journal</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
					</ol>
				</nav>
			</div>
			
		</div>
		<!--end breadcrumb-->
		<div class="row">
			@if(Session::has('flash_message_error'))
			<div class="alert alert-danger">

				<strong> {!! session('flash_message_error') !!} </strong>
			</div>

			@endif
			@if(Session::has('flash_message_success'))
			<div class="alert alert-success">

				<strong> {!! session('flash_message_success') !!} </strong>
			</div>
			@endif
			<!-- Laravel Validations Errors------>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="col-xl-12 mx-auto">
				<h6 class="mb-0 text-uppercase">Edit Inventory Journal</h6>
				<hr/>
				<div class="card">
					<div class="card-header">
                <div class="ms-auto">
                    <div class="col">

                       
                        <a href="{{route('user.journal.list')}}" class="btn btn-primary px-5 rounded-0" style="float: right;">Back</a>
                    </div>
                </div>
            </div>
					<div class="card-body">
						<div class="p-4 border rounded">
							<form class="row g-3 needs-validations" action="{{route('user.journal.update',$editData['id'])}}" method="post" novalidate>@csrf
								<div class="col-sm-6">
									<label for="validationCustom01" class="form-label">Journal Title</label>
									<input type="text" class="form-control" id="validationCustom01" name="title" value="{{$editData['title']}}" required>
								</div>
								<div class="col-sm-6">
									<label for="validationCustom01" class="form-label">DateTime Created</label>
									<input type="text" class="form-control" id="date-time" name="date" value="{{$editData['date']}}" required>
								</div>
							

								<div class="col-12">
									<button class="btn btn-success" type="submit">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!--end row-->
	</div>
</div>

@endsection

@section("script")
<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
			'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
			  .forEach(function (form) {
			  	form.addEventListener('submit', function (event) {
			  		if (!form.checkValidity()) {
			  			event.preventDefault()
			  			event.stopPropagation()
			  		}

			  		form.classList.add('was-validated')
			  	}, false)
			  })
			})()
		</script>
        <script src="{{asset('assets/plugins/datetimepicker/js/legacy.js')}}"></script>
        <script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
        <script src="{{asset('assets/plugins/datetimepicker/js/picker.time.js')}}"></script>
        <script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
        
        <script>
            $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: true
            }),
            $('.timepicker').pickatime()
        </script>
        <script>
            $(function () {
                $('#date-time').bootstrapMaterialDatePicker({
                    format: 'YYYY-MM-DD HH:mm'
                });
                $('.date').bootstrapMaterialDatePicker({
                    time: false
                });
                $('#time').bootstrapMaterialDatePicker({
                    date: false,
                    format: 'HH:mm'
                });
            });
        </script>

<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function () {
			'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
			  .forEach(function (form) {
			  	form.addEventListener('submit', function (event) {
			  		if (!form.checkValidity()) {
			  			event.preventDefault()
			  			event.stopPropagation()
			  		}

			  		form.classList.add('was-validated')
			  	}, false)
			  })
			})()
		</script>
		@endsection