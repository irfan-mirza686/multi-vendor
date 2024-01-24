@extends("admin.layouts.layout")
@section('title', '| Edit Package')

@section("content")
<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Package</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
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
			<div class="col-xl-9 mx-auto">
				<!-- <h6 class="mb-0 text-uppercase">Basic Validation</h6> -->
				<hr/>
				<div class="card">
					<div class="card-header">
						<div class="ms-auto">
							<div class="col">

								<a href="{{route('admin.package.types')}}" class="btn btn-primary px-5 rounded-0" style="float: right;"><i class="fadeIn animated bx bx-arrow-back"></i> Back</a>
								
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="p-4 border rounded">
							<form class="row g-3 needs-validations" action="{{route('admin.package.type.update',$editData['id'])}}" method="post" novalidate>@csrf
								<div>
									<label for="validationCustom01" class="form-label">Country Name</label>
									<input type="text" class="form-control" id="validationCustom01" name="name" value="{{$editData['name']}}" required>
									<div class="valid-feedback">Looks good!</div>
								</div>

								<div class="col-12">
									<button class="btn btn-info" type="submit">Update</button>
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
		@endsection