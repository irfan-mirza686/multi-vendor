<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Session;

class AdminSettingsController extends Controller
{
    public function index(Request $request)
    {

        $pageTitle = 'General Setting';

        $general = GeneralSetting::first();
        // echo "<pre>"; print_r($general); exit;
        $timezones = json_decode(file_get_contents(resource_path('views/admin/layouts/timezone.json')));

        return view('admin.setting.general', compact('pageTitle', 'general', 'timezones'));
    }
    public function chatSetting(Request $request)
    {
        $pageTitle = "Live Chat Setting";
        $general = GeneralSetting::first();
        return view('admin.setting.livechat', compact('pageTitle', 'general'));
    }
    public function updateChatSetting(Request $request)
    {
        try {
            $settings = GeneralSetting::first();
            if ($settings) {
                $settings->sitename = 'Market Price Book';
                $settings->twak_allow = $request->twak_allow;
                $settings->twak_key = $request->twak_key;
                $settings->twak_chatID = $request->twak_chatID;
                $settings->save();
            } else {
                $create = new GeneralSetting;
                $create->sitename = 'Market Price Book';
                $create->twak_allow = $request->twak_allow;
                $create->twak_key = $request->twak_key;
                $create->twak_chatID = $request->twak_chatID;
                $create->save();
            }
            Session::flash('flash_message_success', 'Update Settings');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('flash_message_error', $th->getMessage());
            return redirect()->back();
        }
    }
    public function updateGeneralSettings(Request $request)
    {
        try {
            $settings = GeneralSetting::first();
            $logo = $settings->logo;
            if ($request->file('logo')) {
                $file = $request->file('logo');
                $rand = uniqid();
                $ext = $file->getClientOriginalExtension();

                $newDocName = $rand . '.' .$ext;
                $file->move(public_path('assets/uploads/logo'), $newDocName);
                $logo = $newDocName;
            }
            if ($settings) {



                $settings->sitename = $request->sitename;
                $settings->wholesaler_reg = $request->wholesaler_reg;
                $settings->vendor_reg = $request->vendor_reg;
                $settings->user_reg = $request->user_reg;
                $settings->talk_to = $request->talk_to;
                $settings->logo = $logo;
                $settings->save();
            } else {
                $create = new GeneralSetting;

                $create->sitename = $request->sitename;
                $create->wholesaler_reg = $request->wholesaler_reg;
                $create->vendor_reg = $request->vendor_reg;
                $create->user_reg = $request->user_reg;
                $create->talk_to = $request->talk_to;
                $create->logo = $logo;
                $create->save();
            }
            Session::flash('flash_message_success', 'Update Settings');
            return redirect()->back();
        } catch (\Throwable $th) {
            Session::flash('flash_message_error', $th->getMessage());
            return redirect()->back();
        }
    }
}
