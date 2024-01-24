<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    /*******************************************************************/
    public function emailConfig()
    {
        $general = GeneralSetting::first();
        return view('admin.email.config',compact('general'));
    }
    /*******************************************************************/

    public function emailConfigUpdate(Request $request)
    {
       
            $data = $request->validate([
                'email_from' => 'required|email',
                'email_method' => 'required',
                'smtp_config' => "required_if:email_method,==,smtp",
                'smtp_config.*' => 'required_if:email_method,==,smtp'
            ]);
             // echo "<pre>"; print_r($data); exit();

            $general = GeneralSetting::first();

            $general->update($data);

            return redirect()->back()->with('flash_message_success','Email Setting Updated Successfully');
       

    }
    /*******************************************************************/

    public function emailTemplates()
    {
      $pageTitle = "Email Tempates";
        $emailTemplates = EmailTemplate::latest()->paginate();
        return view('admin.email.templates',compact('pageTitle','emailTemplates'));
    }
    /*******************************************************************/
    public function emailTemplatesEdit (EmailTemplate $template)
    {
        $pageTitle = "Edit Template";
        // echo "<pre>"; print_r($template); exit();
        return view('admin.email.edit',compact('pageTitle','template'));
    }
    /*******************************************************************/
    public function emailTemplatesUpdate(Request $request, EmailTemplate $template)
    {
      
        $data = $request->validate([
            'subject' => 'required',
            'template' => 'required',
        ]);

        $template->update($data);



        return redirect()->back()->with('flash_message_success','Email Template Updated Successfully');

    }
    /*******************************************************************/
}
