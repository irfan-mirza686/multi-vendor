@extends("wholesaler.layouts.layout")
@section('title', '| Edit Product')

@section("style")

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section("content")
<div class="page-wrapper">
	<div class="page-content">
	@include('show_flash_msgs')

		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Product</div>
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

		<div class="card">
			<div class="card-header">
				<div class="ms-auto">
					<div class="col">

						<a href="" class="btn btn-primary px-5 rounded-0"
							style="float: right;">Back</a>
					</div>
				</div>
			</div>
			<form action="{{route('wholesaler.product.update',$editData->id)}}" method="post" enctype="multipart/form-data">@csrf
				<div class="card-body p-4">
					<h5 class="card-title">Add New Product</h5>
					<hr />
					<div class="form-body mt-4">
						<div class="row">

							<div class="col-lg-8">
								<div class="border border-3 p-4 rounded">
									<div class="row">

										<div class="mb-3 col-md-12">
											<label for="name" class="form-label">Product Name <font
													style="color: red;">*</font></label>
											<input type="text" class="form-control" id="name"
												name="name" placeholder="Product"
												value="{{$editData->name ?? old('name')}}">

										</div>
										<div class="mb-3 col-md-4">
											<label for="sku" class="form-label">SKU <font style="color: red;">*</font>
												</label>
											<input type="text" class="form-control" id="sku" name="sku"
												placeholder="SKU" value="{{$editData->name ?? old('sku')}}">

										</div>

										<div class="mb-3 col-md-4">
											<label for="item_price" class="form-label">Item Price <font style="color: red;">*</font> </label>
											<input type="text" class="form-control" name="item_price" id="item_price"
												placeholder="Item Price" value="{{$editData->item_price ?? old('item_price')}}">
										</div>
										<div class="mb-3 col-md-4">
											<label for="discount" class="form-label">Discount (%) </label>
											<input type="text" class="form-control" name="discount" id="discount"
												placeholder="Discount (%)" value="{{$editData->discount ?? old('discount')}}">
										</div>

										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Description <font style="color: red;">*</font></label>
											<textarea class="form-control" name="description"
												id="inputProductDescription" rows="3">{{$editData->description ?? old('description')}}</textarea>
										</div>

										<div class="mb-3">
											<label for="thumbnail" class="form-label">Thumbnail <font style="color: red;">*</font></label>
											<input class="form-control form-control-sm" accept="image/*" name="image"
												id="thumbnail" type="file">
										</div>
									</div>
									<div class="mb-3">
											<label for="other_images" class="form-label">Other Images</label>

											<input type="file" name="other_images[]" class="form-control form-control-sm" id="other_images" accept="image/*" multiple="">
										</div>
									<div class="row">
										<div class="mb-12 mb-2">
											<label for="meta_title" class="form-label">Meta Title</label>
											<input type="text" class="form-control" name="meta_title" id="meta_title"
												placeholder="Meta Title" value="{{$editData->meta_title ?? old('meta_title')}}">
										</div>
										<div class="mb-12">
											<label for="meta_keywords" class="form-label">Meta Keywords</label>
											<input type="text" class="form-control" name="meta_keywords"
												id="meta_keywords" placeholder="Meta Keywords"
												value="{{$editData->meta_keywords ?? old('meta_keywords')}}">
										</div>
										<div class="mb-12">
											<label for="inputProductDescription" class="form-label">Meta
												Description</label>
											<textarea class="form-control" name="meta_description"
												id="inputProductDescription" placeholder="Meta Description"
												rows="3">{{$editData->meta_description ?? old('meta_description')}}</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="border border-3 p-4 rounded">
									<div class="row g-3">


										<div class="col-12">
											<label for="category" class="form-label">Categories <font style="color: red;">*</font> </label>
											<select class="single-select" name="category_id" id="category">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['categories'] as $category)
												<option value="{{$category['id']}}" {{($editData->category_id==$category['id'])?'selected':''}}>{{$category['name']}}</option>
												@endforeach
											</select>
										</div>


										<div class="col-12">
											<label for="unit" class="form-label">Unit <font style="color: red;">*</font>
												</label>
											<select class="single-select" name="unit_id" id="unit">
												<option disabled selected>-select-</option>
												@foreach($getUserInformation['units'] as $unit)
												<option value="{{$unit['id']}}" {{($editData->unit_id==$unit['id'])?'selected':''}}>{{$unit['name']}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-12">
											<label for="status" class="form-label">Status <font style="color: red;">*
												</font></label>
											<select class="single-select" name="status" id="status">
												<option value="" disabled selected>-Select</option>
												<option value="active" {{($editData->status=='active')?'selected':''}}>Active</option>
												<option value="inactive" {{($editData->status=='inactive')?'selected':''}}>InActive</option>
											</select>
										</div>

										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary">Update</button>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!--end row-->
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

@endsection

@section("script")

<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
		'use strict'
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')
		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function(form) {
				form.addEventListener('submit', function(event) {
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
