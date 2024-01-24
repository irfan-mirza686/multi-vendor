@extends("vendor_panel.layouts.layout")
@section('title', '| Add Product')

@section("style")
<link href="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
						<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Create</li>
					</ol>
				</nav>
			</div>
			
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<div class="card-header">
                <div class="ms-auto">
                    <div class="col">

                       
                        <a href="{{route('user.products')}}" class="btn btn-primary px-5 rounded-0" style="float: right;">Back</a>
                    </div>
                </div>
            </div>
			<form action="{{route('user.product.store')}}" method="post" enctype="multipart/form-data">@csrf
				<div class="card-body p-4">
					<h5 class="card-title">Add New Product</h5>
					<hr/>
					<div class="form-body mt-4">
						<div class="row">
							
							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="row">

										<div class="mb-3 col-md-12">
											<label for="ProductNameE" class="form-label">Product Name <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="ProductNameE" name="ProductNameE" placeholder="Product" value="{{old('ProductNameE')}}">
											<input type="hidden" name="GS1_GCP" value="{{$getUserInformation['GS1_GCP']}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="sku" class="form-label">SKU <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" value="{{old('sku')}}">
										
										</div>
										<div class="mb-3 col-md-6">
											<label for="BrandName" class="form-label">Brand Name <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="BrandName" name="BrandName" placeholder="Brand Name" value="{{old('BrandName')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="MnfCode" class="form-label">Product Manufactural Code</label>
											<input type="text" class="form-control" name="MnfCode" id="MnfCode" placeholder="Manufactural Code" value="{{old('MnfCode')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="MnfGLN" class="form-label">Manufactural GLN </label>
											<input type="text" class="form-control" name="MnfGLN" id="MnfGLN" placeholder="Manufactural GLN" value="{{old('MnfGLN')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="size" class="form-label">Size <font style="color: red;">*</font></label>
											<input type="text" name="size" class="form-control" id="size" placeholder="Size" value="{{old('size')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="childProduct" class="form-label">Child Product </label>
											<input type="text" class="form-control" name="childProduct" id="childProduct" placeholder="Child Product" value="{{old('childProduct')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="quantity" class="form-label">Quantity <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="{{old('quantity')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="batch_no" class="form-label">Batch No </label>
											<input type="text" class="form-control" name="batch_no" id="batch_no" placeholder="Batch No" value="{{old('batch_no')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="expiry_date" class="form-label">Expiry Date </label>
											<input type="text" class="form-control date" name="expiry_date" id="expiry_date" placeholder="Expiry Date" value="{{old('expiry_date')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="item_price" class="form-label">Item Price </label>
											<input type="text" class="form-control" name="item_price" id="item_price" placeholder="Item Price" value="{{old('item_price')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="sscc" class="form-label">SSCC</label>
											<input type="text" class="form-control" name="sscc" id="sscc" placeholder="SSCC" value="{{old('sscc')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="GLN_ID" class="form-label">GLN_ID</label>
											<input type="text" class="form-control" name="GLN_ID" id="GLN_ID" placeholder="GLN_ID" value="{{old('GLN_ID')}}">
										</div>
										<div class="mb-3 col-md-6">
											<label for="locations" class="form-label">Location <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="locations" id="locations" placeholder="Location" value="{{old('locations')}}">
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
											<label for="formFileSm" class="form-label">Choose File</label>
											<input class="form-control form-control-sm" accept="image/*" name="image" id="formFileSm" type="file">
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
											<label for="category" class="form-label">Categories </label>
											<select class="single-select" name="category" id="category">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['categories'] as $category)
												<option value="{{$category['name']}}">{{$category['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="Origin" class="form-label">Region</label>
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

@section("script")
<script src="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
<script>
	$(document).ready(function () {
		$('#image-uploadify').imageuploadify();
	})
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
		<script>
			$("#searc_gpc").autocomplete({

				source: "/user/ajax-search-gcp",
				minLength: 1,
				multiselect: true,
				select: function (event, ui) {
					var item = ui.item;
					if (item) {
						$("#searc_gpc").val(item.searc_gpc);
					}
				}
			});
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
		@endsection