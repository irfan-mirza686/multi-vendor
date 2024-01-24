@extends("admin.layouts.layout")
@section('title', '| Email Configuration')



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
			<div class="breadcrumb-title pe-3">Settings</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Email Configuration</li>
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
			<form action="" method="post" enctype="multipart/form-data">@csrf
				<div class="card-body p-4">
					<h5 class="card-title">Email Configuration</h5>
					<hr/>
					<div class="form-body mt-4">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="border border-3 p-4 rounded">
									<div class="row">
										<div class="mb-3 col-md-6">
											<label for="email_method" class="form-label">Email Method <font style="color: red;">*</font></label>
											<select class="form-control" name="email_method" id="email_method">
												<option value="php" {{ @$general->email_method == 'php' ? 'selected' : '' }}>PHPMail</option>
												<option value="smtp" {{ @$general->email_method == 'smtp' ? 'selected' : '' }}>
												SMTP Mail</option>
											</select>
										</div>

										<div class="mb-3 col-md-6">
											<label for="email_from" class="form-label">Email Sent From <font style="color: red;">*</font></label>
											<input type="text" class="form-control" id="email_from" name="email_from" placeholder="Email Sent From" value="{{@$general->email_from}}">
										</div>
									</div>
									<div class="row smtp-config">
										@if (@$general->email_method == 'smtp')
										<div class="col-md-3">
											<label for="smtp_host" class="form-label">SMTP HOST <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="smtp_config[smtp_host]" placeholder="SMTP HOST" value="{{ @$general->smtp_config->smtp_host }}">
										</div>
										<div class="col-md-3">
											<label for="smtp_username" class="form-label">SMTP Username <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="smtp_config[smtp_username]" placeholder="SMTP Username" value="{{ @$general->smtp_config->smtp_username }}">
										</div>
										<div class="col-md-3">
											<label for="smtp_password" class="form-label">SMTP Password <font style="color: red;">*</font></label>
											<input type="text" class="form-control" name="smtp_config[smtp_password]" placeholder="SMTP Password" value="{{ @$general->smtp_config->smtp_password }}">
										</div>
										<div class="col-md-3">
											<label for="smtp_port" class="form-label">SMTP Port <font style="color: red;">*</font></label>
											<input type="text" name="smtp_config[smtp_port]" class="form-control" placeholder="SMTP Port" value="{{ @$general->smtp_config->smtp_port }}">
										</div>
										<div class="col-md-6 mt-3">
											<label for="smtp_encryption" class="form-label">SMTP Encryption <font style="color: red;">*</font></label>
											<select class="form-control" name="smtp_config[smtp_host]" id="encryption">
												<option value="ssl"
												{{ @$general->smtp_config->smtp_encryption == 'ssl' ? 'selected' : '' }}>
											SSL</option>
											<option value="tls"
											{{ @$general->smtp_config->smtp_encryption == 'tls' ? 'selected' : '' }}>
										TLS</option>
									</select>
									<code class="hint"></code>
								</div>
								@endif
							</div>
						</div>
					</div>
					
					<div class="col-12 mt-4">
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Update Email Configuration</button>
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

<script>
	$(function() {
		'use strict'

		$('select[name=email_method]').on('change', function() {
			if ($(this).val() == 'smtp') {
				var html = `
				
				<div class="row">

				<div class="col-md-3">

				<label for="">SMTP HOST <font style="color: red;">*</font></label>
				<input type="text" name="smtp_config[smtp_host]"  class="form-control" value="{{ @$general->smtp_config->smtp_host }}">

				</div> 
				
				<div class="col-md-3">

				<label for="">SMTP Username <font style="color: red;">*</font></label>
				<input type="text" name="smtp_config[smtp_username]"  class="form-control" value="{{ @$general->smtp_config->smtp_username }}">

				</div>
				
				<div class="col-md-3">

				<label for="">SMTP Password <font style="color: red;">*</font></label>
				<input type="text" name="smtp_config[smtp_password]"  class="form-control" value="{{ @$general->smtp_config->smtp_password }}">

				</div>
				<div class="col-md-3">

				<label for="">SMTP Port <font style="color: red;">*</font></label>
				<input type="text" name="smtp_config[smtp_port]"  class="form-control" value="{{ @$general->smtp_config->smtp_port }}">

				</div> 
				
				<div class="col-md-6 mt-3">

				<label for="">SMTP Encryption</label>
				<select name="smtp_config[smtp_encryption]" id="" class="form-control">
				<option value="ssl" {{ @$general->smtp_config->smtp_encription == 'ssl' ? 'selected' : '' }}>SSL</option>
				<option value="tls" {{ @$general->smtp_config->smtp_encription == 'tls' ? 'selected' : '' }}>TLS</option>
				</select>

				</div>
				
				</div>
				
				`;

				$('.smtp-config').html(html)

			} else {
				$('.smtp-config').html('')
			}
		})

		$('#encryption').on('change',function(){
			if($(this).val() == 'ssl'){
				$('.hint').text("For SSL please add ssl:// before host otherwise it won't work")
			}else{
				$('.hint').text('')
			}
		})
	})
</script>
@endpush