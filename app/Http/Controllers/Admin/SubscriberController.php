<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberRequest;
use App\Repositories\Interfaces\SubscriberRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\EmailNotification;
use App\Models\NoticeNotification;
use Auth;
use Exception;

class SubscriberController extends Controller
{
    private $subscriberRepository;

    public function __construct(SubscriberRepositoryInterface $subscriberRepository){
        $this->subscriberRepository = $subscriberRepository;
    }
    /********************************************************************/

    public function index()
    {
        $viewData = $this->subscriberRepository->all();
        return view('admin.subscribers.index',compact('viewData'));
    }
    /********************************************************************/
    public function create()
    {
        return view('admin.subscribers.create');
    }
    /********************************************************************/
    public function store(SubscriberRequest $request)
    {
        $this->subscriberRepository->store($request->all());
        return redirect(route('admin.subscribers'))->with('flash_message_success','Data Saved Successfully');
    }
    /********************************************************************/
    public function edit($id=null)
    {
        $editData = $this->subscriberRepository->find($id);
        return view('admin.subscribers.edit',compact('editData'));
    }
    /********************************************************************/
    public function update(Request $request,$id=null)
    {
        $this->subscriberRepository->update($request->all(),$id);
        return redirect(route('admin.subscribers'))->with('flash_message_success','Data Updated Successfully');
    }
    /********************************************************************/
    public function delete($id=null)
    {
        $this->subscriberRepository->delete($id);
        return redirect(route('admin.subscribers'))->with('flash_message_success','Data Deleted Successfully');
    }
    /********************************************************************/
    public function emailNotifications(Request $request)
    {
        
        if ($request->ajax()) {
          $validator = Validator::make($request->all(),[
            'subject' => 'required',
            'subscriber_id' => 'required',
            'email' => 'required',
            'message' => 'required',
            'attachment' => 'required'
        ]);

          if ($validator->fails()) {
              return response()->json([
                'status' => 422,
                'error' => $validator->messages()
            ]);
          }else{  // start else
            try {
                $data = $request->all();
                
                $attachments = [];
                $dbFile = [];
                $attachment = $request->file('attachment');
                if($request->hasFile('attachment')){
                    foreach ($attachment as $attach) {
                        $path = public_path('upload');
                        $file_name = rand(1111,9999) . '.' . $attach->getClientOriginalExtension();
                        $attach->move($path, $file_name);
                        $attachments[] = $path.'/'.$file_name;
                        $dbFile[] = $file_name;
                    }

                }
                $email_notification = new EmailNotification;
                $email_notification->subscriber_id = $data['subscriber_id'];
                $email_notification->subject = $data['subject'];
                $email_notification->message = $data['message'];
                $email_notification->images = isset($dbFile)?serialize($dbFile):null;
                $email_notification->sendBy = Auth::guard('admin')->user()->id;
                $email_notification->save();

                sendGeneralMail($data,$attachments);
                return response()->json([
                    'status' => 200,
                    'message' => 'Email Sent Successfully'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 500,
                    'error' => 'Oops, something went wrong!'
                ]);
            }

            

          } // End Else
      }
      
  }
  /********************************************************************/
  public function noticeNotifications(Request $request)
  {
    if ($request->ajax()) {

        $validator = Validator::make($request->all(),[
            'message' => 'required'
        ]);

        if ($validator->fails()) {
          return response()->json([
            'status' => 422,
            'error' => $validator->messages()
        ]);
      }else{
        try {
                 // echo "<pre>"; print_r($request->all()); exit();
            $notice = new NoticeNotification;
            $notice->subscriber_id = $request->subscriber_id;
            $notice->message = $request->message;
            $notice->sendBy = Auth::guard('admin')->user()->id;
            $notice->save();
            return response()->json([
                'status' => 200,
                'message' => 'Notice Successfully Sent to ' . $request->subscriber_name
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => 'Oops, something went wrong!'
            ]);
        }

    }

}
}
  /********************************************************************/
}
