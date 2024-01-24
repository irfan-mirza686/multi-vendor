@extends("vendor_panel.layouts.layout")
@section('title', '| Journals')


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
            <div class="breadcrumb-title pe-3">Journal</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Details</li>
                    </ol>
                </nav>
            </div>
           
        </div>
        <!--end breadcrumb-->



        <!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
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
                <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-hover" id="report-data">
                        <!-- Total Opening Stock -->
                        <tbody>  

                            <tr>
                                <td colspan="2" class="text-bold text-primary text-center">Journal Master</td></tr>
                                <!-- Total Purchase -->
                                <tr>
                                    <td><strong>Journal Title</strong> </td>
                                    <td class="text-right text-bold">{{$viewData['title']}}</td>
                                </tr>   
                                <!-- Total Purchase Tax -->


                                <!-- Total Purchase Paid Amount -->


                                <!-- Total Purchase Due -->

                                <tr>
                                    <td><strong>Created DateTime</strong></td>
                                    <td class="text-right text-bold">{{date('Y-m-d H:i',strtotime($viewData['date']))}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                </div>


                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="ms-auto"><a href="{{route('user.export.journal.details')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="fadeIn animated bx bx-export"></i>Export</a></div>
                </div>
            <div class="card-body">
                <h6 class="mb-0 text-uppercase">Journal Details</h6>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="13%">Created Date</th>
                                <th width="10%">Start Date</th>
                                <th width="8%">GTIN</th>
                                <th width="8%">SKU</th>
                                <th width="8%">Qty</th>
                                <th width="7%">Batch NO</th>
                                <th width="10%">Expiry Date</th>
                                <th width="10%">Item Price</th>
                                <th width="15%">Description</th>
                                <th width="9%">Locations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($viewData['journal_details'] as $detail)
                            <?php $counter = $counter+1; ?>
                            <tr>
                                <td>{{$counter}}</td>
                                
                                <td>{{(@$detail['created_date'])?date('Y-m-d H:i',strtotime($detail['created_date'])):''}}</td>
                                <td>{{(@$detail['start_date'])?date('Y-m-d H:i',strtotime($detail['start_date'])):''}}</td>
                                <td>{{$detail['gtin']}}</td>
                                <td>{{$detail['sku']}}</td>
                                <td>{{$detail['qty']}}</td>
                                <td>{{$detail['batch_no']}}</td>
                                <td>{{(@$detail['expiry_date'])?date('Y-m-d H:i',strtotime($detail['expiry_date'])):''}}</td>
                                <td>{{$detail['item_price']}}</td>
                                <td>{{$detail['item_description']}}</td>
                                <td>{{$detail['locations']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection

