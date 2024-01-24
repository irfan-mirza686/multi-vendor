<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\VendorRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Str;
use Session;

class RegisteredVendorController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(VendorRegisterRequest $request)
    {
        try {
            $name = $request->first_name . ' ' . $request->last_name;
            $user = Vendor::create([
                'username' => $request->username,
                'name' => $name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);
            event(new Registered($user));

            // Auth::login($user);
            Session::flash('flash_message_success', 'You are registered successfully');
            return redirect()->back();
            // return redirect(RouteServiceProvider::HOME);
        } catch (\Throwable $th) {
            Session::flash('flash_message_error', $th->getMessage());
            return back();
        }

    }
}