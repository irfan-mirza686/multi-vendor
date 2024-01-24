@extends("admin.layouts.layout")
@section('title', '| Live Chat Setting')



@section("content")
<div class="page-wrapper">
	<div class="page-content">
		@include('show_flash_msgs')
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Settings</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Live Chat</li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<div class="col">

					<a href="{{route('admin.dashboard')}}" class="btn btn-primary px-5 rounded-0">Back</a>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->

		<div class="card">
			<form action="{{route('admin.update.chat.setting')}}" method="post" enctype="multipart/form-data">@csrf
				<div class="card-body p-4">
					<h5 class="card-title">Live Chat Setting</h5>
					<hr/>
					<div class="form-body mt-4">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									
									<div class="row">

										<div class="mb-3 col-md-4">
											<label for="twak_allow" class="form-label">Allow Tawk Live Chat <font style="color: red;">*</font></label>
											<select class="form-control" name="twak_allow" id="twak_allow">
												<option value="no" {{(@$general->twak_allow=='no')?'selected':''}}>No</option>
												<option value="yes" {{(@$general->twak_allow=='yes')?'selected':''}}>
												Yes</option>
											</select>
										</div>
									
										
										<div class="col-md-4">
											<label for="twak_key" class="form-label">Tawk Key <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="twak_key" placeholder="Tawk Key" value="{{@$general->twak_key ?? ''}}">
										</div>
										<div class="col-md-4">
											<label for="twak_chatID" class="form-label">Chat ID <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="twak_chatID" placeholder="Chat ID" value="{{@$general->twak_chatID ?? ''}}">
										</div>
										
									</div>
									
								</div>
							</div>

							<div class="col-12 mt-4">
								<div class="d-grid">
									<button type="submit" class="btn btn-primary">Update Settings</button>
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

@push('custom-script')


@endpush