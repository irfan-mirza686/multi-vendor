@extends("admin.layouts.layout")
@section('title', '| Subscribers')

@section("style")
<link href="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
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
            <div class="breadcrumb-title pe-3">Subscribers</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
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

                        <a href="{{route('admin.subscriber.create')}}" class="btn btn-success px-5 rounded-0" style="float: right;"><i class="fadeIn animated bx bx-plus-circle"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="2%">#</th>
                                <th width="15%">Company Name</th>
                                <th width="10%">Email</th>
                                <th width="15%">Mobile</th>
                                <th width="24%">Address</th>
                                <th width="12%">Start Date</th>
                                <th width="12%">End Date</th>
                                <th width="10%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 0; ?>
                            @foreach($viewData as $subscriber)
                            <?php $counter = $counter+1; ?>
                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$subscriber['company_name']}}</td>
                                <td>{{$subscriber['email']}}</td>
                                <td>{{$subscriber['mobile']}}</td>
                                <td>{{$subscriber['company_address']}}</td>
                                <td>{{$subscriber['start_date']}}</td>
                                <td>{{$subscriber['end_date']}}</td>
                                <td class="text-center">
                                 <div class="col">
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{route('admin.subscriber.edit',$subscriber['id'])}}"><i class="lni lni-pencil-alt"></i> Edit</a>
                                            </li>
                                            <li>

                                                <a title="Delete?" data-toggle="modal" class="dropdown-item deleteRecord" href="javascript:void(0);" rel="{{ $subscriber['id'] }}" rel1="/admin/subscriber/delete" id="delete"><i class="lni lni-trash"></i> Delete</a>
                                            </li>

                                            <li>

                                                <a title="Email?" data-subscriberEmail="{{$subscriber['email']}}" data-subscriberID="{{$subscriber['id']}}" data-subscriberName="{{$subscriber['name']}}" class="dropdown-item sendMail" href="javascript:void(0);" id="sendEmail"><i class="fadeIn animated bx bx-notification"></i> Email</a>
                                            </li>
                                            <li>

                                                <a title="Notice?" data-subscriberID="{{$subscriber['id']}}" data-subscriberName="{{$subscriber['name']}}" class="dropdown-item sendNotice" href="javascript:void(0);" id="sendNotice"><i class="fadeIn animated bx bx-message"></i> Notice</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<!-----------Send Email Notification to Subscriber Modal ----------------->
<div class="modal fade" id="mail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg odal-dialog-scrollable">
        <div class="modal-content">
            <form id="emailNotificationForm" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email Notification to <span id=subscriberName></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                  <label for="">Subject</label>

                  <input type="text" name="subject" class="form-control">
                  <input type="hidden" name="subscriber_id" id="subscriber_id">
                  <input type="hidden" name="email" id="subscriber_email">
              </div>

              <div class="form-group">

                <label for="">Message</label>

                <textarea name="message" id="" cols="30" rows="3" class="form-control"></textarea>

            </div>
            <div class="form-group">
                <label for="inputProductDescription" class="form-label">Attachments</label>
                <input id="image-uploadify" name="attachment[]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

   
             <button class="btn btn-primary" id="sendEmailBtn" type="button"> <span id="emailSpinner" class="" role="status" aria-hidden="true"></span>
                       <span id="replaceEmailBtnTxt">Send Email</span></button>
         </div>
     </form>
     </div>
 </div>
</div>


<!-----------Send Notice Notification to Subscriber Modal ----------------->
<div class="modal fade" id="sms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="NoticeNotificationForm" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Email Notification to <span id=NoticeForSubscriber></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <input type="hidden" name="subscriber_id" id="NoticeSubscriberID">
                <input type="hidden" name="subscriber_name" id="NoticeForSubscriberName">
              <div class="form-group">

                <label for="">Notice</label>

                <textarea name="message" id="" cols="30" rows="5" class="form-control" id="noticeMsg"></textarea>

            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

   
             <button class="btn btn-primary" id="sendNoticeBtn" type="button"> <span id="noticeSpinner" class="" role="status" aria-hidden="true"></span>
                       <span id="replaceNoticeBtnTxt">Send Notice</span></button>
         </div>
     </form>
     </div>
 </div>
</div>

<!---------------->


<!--end page wrapper -->
@endsection

@section('script')
<script src="{{asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#image-uploadify').imageuploadify();
    })
</script>

<script>
    'use strict'

    $(function() {
      $('.sendMail').on('click', function(e) {
        e.preventDefault();
        let subscriberID = $(this).attr("data-subscriberID");
        let subscriberEmail = $(this).attr("data-subscriberEmail");
        let subscriberName = $(this).attr("data-subscriberName");

        $("#subscriber_id").val(subscriberID);
        $("#subscriber_email").val(subscriberEmail);
        $("#subscriberName").text(subscriberName);

        const modal = $('#mail');

        modal.modal('show');
    });

  })
</script>
<script>
    'use strict'

    $(function() {
      $('.sendNotice').on('click', function(e) {
        e.preventDefault();
        let subscriberID = $(this).attr("data-subscriberID");
        let NoticeForSubscriber = $(this).attr("data-subscriberName");

        $("#NoticeSubscriberID").val(subscriberID);
        $("#NoticeForSubscriber").text(NoticeForSubscriber);
        $("#NoticeForSubscriberName").val(NoticeForSubscriber);

        const modal = $('#sms');

        modal.modal('show');
    })


  });
</script>
@endsection

