<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePassRequest;
use App\Models\Vendor;
use Auth;
use Illuminate\Http\Request;
use Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $pageTitle = "Vendor Profile";
        $user = Auth::guard('vendor')->user();
        return view('vendor_panel.profile.index', compact('pageTitle', 'user'));
    }
    public function updateProfile(Request $request, $id = null)
    {
        $admin = Vendor::select('image')->where('id', $id)->first();
        $filename = '';
        if (isset($request['profile_pic']) && !empty($request['profile_pic'])) {
            $filename = uploadImage($request['profile_pic'], filePath('vendors'), $admin->image);

        } else {
            $filename = $admin->image;
        }
        $address = [
            'countryName' => $request['countryName'] ?? '',
            'country_shortName' => $request['country_shortName'] ?? '',
            'stateName' => $request['stateName'] ?? '',
            'cityName' => $request['cityName'] ?? '',
            'zip' => $request['zip_code'] ?? '',
            'address' => $request['address'] ?? '',
        ];

        Vendor::whereId($id)->update([
            'name' => $request['name'],
            'image' => $filename,
            'business_name' => $request['business_name'],
            'address' => $address
        ]);
        return redirect(route('vendor.profile'))->with('flash_message_success', 'Profile Updated');
        // echo "<pre>"; print_r($request->all()); exit;
    }
    /******************************************************/
    public function changeThemeSettings(Request $request)
    {
        if ($request->ajax()) {
            //    echo "<pre>"; print_r($request->all()); exit();
            $adminSetting = Vendor::select('id', 'settings')->where('id', Auth::guard('admin')->user()->id)->first();
            $settings = $adminSetting->settings;

            $data = [
                'themeMode' => $request->themeMode ?? @$settings['themeMode'],
                'headerColor' => $request->headerColor ?? @$settings['headerColor'],
                'sidebarColor' => $request->sidebarColor ?? @$settings['sidebarColor'],
            ];

            Vendor::where('id', Auth::guard('admin')->user()->id)->update(['settings' => $data]);
        }
    }
    /******************************************************/
    public function updatePassword(UpdatePassRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); exit;
            if (Hash::check($data['current_pass'], Auth::guard('vendor')->user()->password)) {
                // check new and confirm password is matching....
                if ($data['new_pass'] == $data['confirm_pass']) {
                    Vendor::where('id', Auth::guard('vendor')->user()->id)->update(['password' => bcrypt($data['new_pass'])]);
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
}
