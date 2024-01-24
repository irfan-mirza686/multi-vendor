<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\ConsumerRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Str;
use Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function registerAs(Request $request)
    {
        $type = $request->type;
        $categories = array();
        $pageTitle = strtoupper($type) . ' ' . "Register";
        if ($request->type == 'consumer') {
            return view('frontend.auth.register', compact('pageTitle','categories'));
        } else if ($request->type == 'vendor') {
            return view('frontend.auth.vendor_register', compact('pageTitle','categories'));
        } else if ($request->type == 'wholesaler') {
            return view('frontend.auth.wholesaler_register', compact('pageTitle','categories'));
        }
    }
    public function create()
    {
        $pageTitle = "Register";
        return view('frontend.auth.register', compact('pageTitle'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(ConsumerRegisterRequest $request)
    {
        try {
            $name = $request->first_name . ' ' . $request->last_name;
            $user = User::create([
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
