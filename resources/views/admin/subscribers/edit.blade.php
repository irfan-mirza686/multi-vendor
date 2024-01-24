@extends("admin.layouts.layout")
@section('title', '| Edit Subscriber Registration Form')

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
            <div class="breadcrumb-title pe-3">Subscriber</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Registration Form</li>
                    </ol>
                </nav>
            </div>
           
        </div>
        <!--end breadcrumb-->

        <!--end row-->
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Edit Subscriber Form</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-header">
                        <div class="ms-auto">
                            <div class="col">

                                <a href="{{route('admin.subscribers')}}" class="btn btn-primary px-5 rounded-0" style="float: right;"><i class="fadeIn animated bx bx-arrow-back"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <form action="{{route('admin.subscriber.update',$editData['id'])}}" method="post">@csrf
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Edit Subscriber Registration</h5>
                                </div>
                                <hr/>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Full Name <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEnterYourName" placeholder="Full Name" name="name" value="{{$editData['name']}}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Company Name <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEnterYourName" placeholder="Company Name" name="company_name" value="{{$editData['company_name']}}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmailAddress2" placeholder="Email Address" name="email" value="{{$editData['email']}}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPhoneNo2" placeholder="Phone No" name="mobile" value="{{$editData['mobile']}}" required>
                                    </div>
                                </div>

                              

                                <div class="row mb-3">
                                    <label for="inputAddress4" class="col-sm-3 col-form-label">Company Address <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="inputAddress4" rows="3" placeholder="Address" name="company_address"> {{$editData['company_address']}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="startDate" class="col-sm-3 col-form-label">Start Date <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <input class="result form-control date" name="start_date" type="text" id="date" placeholder="Date Picker..." value="{{$editData['start_date']}}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="startDate" class="col-sm-3 col-form-label">End Date <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <input class="result form-control date" type="text" name="end_date" id="date" placeholder="Date Picker..." value="{{$editData['end_date']}}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Status <font style="color: red;">*</font></label>
                                    <div class="col-sm-9">
                                        <select class="single-select" name="status" required>
                                            <option value="" disabled selected>-Select</option>
                                            <option value="1" {{(@$editData['status']=='1')?"selected":''}}>Active</option>
                                            <option value="0" {{(@$editData['status']=='0')?"selected":''}}>InActive</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info px-5">Update</button>
                                    </div>
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

        
        @endsection