@extends("admin.layouts.layout")
@section('title', '| WholeSalers')

@section("style")

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{asset('assets/css/upload_img.css')}}">
@endsection

@section("content")

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-pic-wrapper">
                                    <div class="pic-holder">
                                        <!-- uploaded pic shown here -->
                                        <?php 
                                        $image = '';
                                        if ($user->image) { 

                                            $image = asset('assets/uploads/admins/'.$user->image);
                                    }else{ 
                                            $image = asset('assets/uploads/no-image.png');
                                         
                                        }
                                    
                                       ?>
                                        <img id="profilePic" class="pic" src="<?php echo $image; ?>">

                                        <Input class="uploadProfileInput" type="file" name="profile_pic"
                                            id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
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
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    @foreach($user->social_links as $key => $link)
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <i class="{{$socialIcons[$key]}}" style="{{$iconsColor[$key]}}"></i> Website
                                        </h6>
                                        <input type="text"
                                            class="form-control form-control-sm col-md-8 text-end text-secondary"
                                            name="" value="{{$link}}" style="border: none;">
                                        <!-- <span class="text-secondary">https://codervent.com</span> -->
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="John Doe" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="john@example.com" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="(239) 816-9029" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="(320) 380-4539" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Bay Area, San Francisco, CA" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="button" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Quotations Status</h5>
                                        <p>Total</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>Cancelled</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"
                                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>Approved</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{$approvedPercentage}}%" aria-valuenow="89"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>Pending</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{$pendingPercentage}}%" aria-valuenow="55"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>Backend API</p>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 66%"
                                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-9 mx-auto">
                            <h6 class="mb-0 text-uppercase">Quotations Status</h6>
                            <hr/>
                            <div class="card">
                                <div class="card-body">
                                    <div id="chart13"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("custom-script")

<!-- <script type="text/javascript">
    $("#subscriberUpdatePassBtn").click(function() {
        $("#updateSubscriberPassModal").modal('show');
    });
</script> -->

<script src="{{asset('assets/js/upload_img.js')}}"></script>
<script src="{{asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<!-- <script src="{{asset('assets/admin/js/current_user_changePass.js')}}"></script> -->
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").alert('close');
    }, 10000);
</script>

<script>
// chart 13
	
var options = {
          series: <?php echo json_encode($chartQValues); ?>,
          chart: {
			  foreColor: '#9ba7b2',
          height: 350,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: '22px',
              },
              value: {
                fontSize: '16px',
              },
              total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                  return <?php echo json_encode($totalQuotations); ?>
                }
              }
            }
          }
        },
		colors: ["#008000", "#FFFF00"],
        labels: <?php echo json_encode($chartQName); ?>,
        };

        var chart = new ApexCharts(document.querySelector("#chart13"), options);
        chart.render();    
</script>
@endpush