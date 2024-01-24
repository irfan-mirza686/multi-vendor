@extends("admin.layouts.layout")
@section('title', '| Add Product')

@section("style")

@endsection

@section("content")
<div class="page-wrapper">
	<div class="page-content">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Product</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Create</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="col">

					<a href="{{route('user.products')}}" class="btn btn-primary px-5 rounded-0">Back</a>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<form action="{{route('user.product.store')}}" method="post" enctype="multipart/form-data">@csrf
				<div class="card-body p-4">
					<h5 class="card-title">Add New Product</h5>
					<hr/>
					<div class="form-body mt-4">
						<div class="row">
							
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="row">

										<div class="mb-3 col-md-6">
											<label for="ProductNameE" class="form-label">Product Name <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="ProductNameE" name="ProductNameE" placeholder="Product" value="{{old('ProductNameE')}}">
											<input type="hidden" name="barcode" value="{{$getUserInformation['gtinMod']}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="BrandName" class="form-label">Brand Name <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Brand Name" value="{{old('BrandName')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="MnfCode" class="form-label">Product Manufactural Code [Optional]</label>
											<input type="text" class="form-control" name="MnfCode" id="MnfCode" placeholder="Manufactural Code" value="{{old('MnfCode')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="MnfGLN" class="form-label">Manufactural GLN [Optional]</label>
											<input type="text" class="form-control" name="MnfGLN" id="MnfGLN" placeholder="Manufactural GLN" value="{{old('MnfGLN')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="size" class="form-label">Size <font style="color: red;">*</font></label>
											<input type="text" name="size" class="form-control" id="size" placeholder="Size" value="{{old('size')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="childProduct" class="form-label">Child Product [Optional]</label>
											<input type="text" class="form-control" name="childProduct" id="childProduct" placeholder="Child Product" value="{{old('childProduct')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="quantity" class="form-label">Quantity</label>
											<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{old('quantity')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="gpc" class="form-label">Global Product Category <font style="color: red;">*</font> </label>
											<input type="text" class="form-control" name="gpc" id="searc_gpc" placeholder="search gpc...">
										</div>
										
										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Description</label>
											<textarea class="form-control" name="description" id="inputProductDescription" rows="3"></textarea>
										</div>
										
										<div class="mb-3">
											<label for="thumbnail" class="form-label">Thumbnail</label>
											<input class="form-control form-control-sm" accept="image/*" name="image" id="thumbnail" type="file">
										</div>

										<div class="mb-3">
											<label for="other_images" class="form-label">Other Images</label>
											<input class="form-control form-control-sm" accept="image/*" name="other_images" id="other_images" type="file" multiple>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">
										<div class="col-12">
											<label for="inputPrice" class="form-label">Provider GLN</label>
											<input type="text" class="form-control" name="ProvGLN" readonly id="inputPrice" value="{{$getUserInformation['providerGLN']}}" placeholder="Provider GLN">
										</div>
										<div class="col-12">
											<label for="ProductType" class="form-label">Product Type <font style="color: red;">*</font></label>
											<select class="single-select" name="ProductType" id="ProductType">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['productTypes'] as $types)
												<option value="{{$types['name']}}">{{$types['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="Origin" class="form-label">Origin</label>
											<select class="single-select" name="Origin" id="Origin">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['countries'] as $origin)
												<option value="{{$origin['name']}}">{{$origin['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="PackagingType" class="form-label">Package Type</label>
											<select class="single-select" name="PackagingType" id="PackagingType">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['packageTypes'] as $package)
												<option value="{{$package['name']}}">{{$package['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="unit" class="form-label">Unit <font style="color: red;">*</font></label>
											<select class="single-select" name="unit" id="unit">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['units'] as $unit)
												<option value="{{$unit['name']}}">{{$unit['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="status" class="form-label">Status <font style="color: red;">*</font></label>
											<select class="single-select" name="status" id="status">
												<option value="" disabled selected>-Select</option>
												<option value="1">Active</option>
												<option value="0">InActive</option>
											</select>
										</div>
										
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Save Product</button>
											</div>
										</div>
									</div> 
								</div>
							</div>
							
						</div><!--end row-->
					</div>
				</div>
			</form>
		</div>


	</div>
</div>

@endsection

@push("custom-script")


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