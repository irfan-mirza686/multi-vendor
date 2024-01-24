<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use Auth;
use App\Models\Admin;
use Hash;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    /******************************************************/
    public function profile()
    {
        return view('admin.profile.index');
    }
    /******************************************************/
    public function profileUpdate(Request $request)
    {
        $this->adminService->updateProfile($request->all(), Auth::guard('admin')->user()->id);
        return redirect(route('admin.profile'))->with('flash_message_success', 'Profile Updated');
    }
    /******************************************************/
    public function updatePassword(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if (Hash::check($data['current_pass'], Auth::guard('admin')->user()->password)) {
                // check new and confirm password is matching....
                if ($data['new_pass'] == $data['confirm_pass']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pass'])]);
                    $status = 200;
                    $message = 'Passwor Changed Successfully';

                } else {
                    $status = 422;
                    $message = 'Confirm Password Does not Match!';
                }
            } else {
                $status = 401;
                $message = 'Current Password Does not Match!';
            }
            return response()->json([
                'status' => $status,
                'message' => $message
            ]);
        }
    }
    /******************************************************/
    public function changeThemeSettings(Request $request)
    {
        if ($request->ajax()) {
            //    echo "<pre>"; print_r($request->all()); exit();
            $adminSetting = Admin::select('id', 'settings')->where('id', Auth::guard('admin')->user()->id)->first();
            $settings = $adminSetting->settings;

            $data = [
                'themeMode' => $request->themeMode ?? @$settings['themeMode'],
                'headerColor' => $request->headerColor ?? @$settings['headerColor'],
                'sidebarColor' => $request->sidebarColor ?? @$settings['sidebarColor'],
            ];

            Admin::where('id', Auth::guard('admin')->user()->id)->update(['settings' => $data]);
        }
    }
    /******************************************************/
}
