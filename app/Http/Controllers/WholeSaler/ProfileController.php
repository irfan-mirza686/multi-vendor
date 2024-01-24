<?php

namespace App\Http\Controllers\WholeSaler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Wholesaler\WholesalerProfileService;
use Auth;
use App\Models\WholeSaler;
use Hash;

class ProfileController extends Controller
{
    private $wholesalerProfileService;

    public function __construct(WholesalerProfileService $wholesalerProfileService)
    {
        $this->wholesalerProfileService = $wholesalerProfileService;
    }
    /******************************************************/
    public function profile()
    {
        // dd('dfd');
        $pageTitle = "Profile";
        $user = Auth::guard('wholesaler')->user();
        // echo "<pre>"; print_r($user->toArray()); exit;
        return view('wholesaler.profile.index',compact('user','pageTitle'));
    }
    /******************************************************/
    public function profileUpdate(Request $request)
    {

        $this->wholesalerProfileService->updateProfile($request->all(), Auth::guard('wholesaler')->user()->id);
        return redirect(route('wholesaler.profile'))->with('flash_message_success', 'Profile Updated');
    }
    /******************************************************/
    public function updatePassword(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            if (Hash::check($data['current_pass'], Auth::guard('wholesaler')->user()->password)) {
                // check new and confirm password is matching....
                if ($data['new_pass'] == $data['confirm_pass']) {
                    WholeSaler::where('id', Auth::guard('wholesaler')->user()->id)->update(['password' => bcrypt($data['new_pass'])]);
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
            $adminSetting = WholeSaler::select('id', 'settings')->where('id', Auth::guard('admin')->user()->id)->first();
            $settings = $adminSetting->settings;

            $data = [
                'themeMode' => $request->themeMode ?? @$settings['themeMode'],
                'headerColor' => $request->headerColor ?? @$settings['headerColor'],
                'sidebarColor' => $request->sidebarColor ?? @$settings['sidebarColor'],
            ];

            WholeSaler::where('id', Auth::guard('admin')->user()->id)->update(['settings' => $data]);
        }
    }
    /******************************************************/
}
