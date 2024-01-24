@extends("wholesaler.layouts.layout")
@section('title', '| Products')

@section("style")
<link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="{{asset('assets/css/upload_img.css')}}">

@endsection

@section("content")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
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
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

                 @include('common.modals.update_password')

        <div class="container">
            <form action="{{route('wholesaler.profile.update')}}" method="post"  enctype="multipart/form-data">@csrf
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <input type="file" name="demoImage"> -->
                                    <div class="profile-pic-wrapper">
                                      <div class="pic-holder">
                                        <!-- uploaded pic shown here -->
                                        <?php
                                        $image = getFile('admins',$user->image) ?? getFile('', 'user.png');


                                       ?>
                                        <img id="profilePic" class="pic" src="<?php echo $image; ?>">

                                        <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                        <label for="newProfilePhoto" class="upload-file-block">
                                          <div class="text-center">
                                            <div class="mb-2">
                                              <i class="fa fa-camera fa-2x"></i>
                                          </div>
                                          <div class="text-uppercase">
                                              Update <br /> Profile Photo
                                          </div>
                                      </div>
                                  </label>
                              </div>

                          </hr>

                      </div>
                      <div class="d-flex flex-column align-items-center text-center">


                          <!-- <img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110"> -->
                          <div class="mt-3">

                            <h4>{{Auth::guard('wholesaler')->user()->name}}</h4>
                            <p class="text-secondary mb-1"><strong>Email:</strong> {{Auth::guard('wholesaler')->user()->email}}</p>
                            <p class="text-secondary mb-1"><strong>Subscription:</strong>  Standard</p>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                <div class="ms-auto">
                    <div class="col">

                        <a href="javascript:void(0);" data-URL="{{route('wholesaler.update.password')}}" class="btn btn-outline-info px-5 radius-30" id="subscriberUpdatePassBtn" style="float: right;">Update Password</a>
                    </div>
                </div>
            </div>
                <div class="card-body">

                    <input type="hidden" name="status" value="{{$user->status}}">

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Company Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="business_name" value="{{$user->business_name}}" />
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="address" value="{{$user['address']['address']}}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Start Date</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input class="result form-control date" type="text" name="start_date" id="date" placeholder="Start Date" value="{{$user->start_date}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">End Date</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input class="result form-control date" type="text" name="end_date" id="date" placeholder="End Date" value="{{$user->end_date}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
<!--end page wrapper -->
@endsection

@push("custom-script")

<script type="text/javascript">

    $("#subscriberUpdatePassBtn").click(function(){

        $("#updateSubscriberPassModal").modal('show');
});

</script>

<script src="{{asset('assets/plugins/datetimepicker/js/legacy.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.time.js')}}"></script>
<script src="{{asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/js/subscriber.js')}}"></script>

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

<script src="{{asset('assets/js/upload_img.js')}}"></script>


@endpush



