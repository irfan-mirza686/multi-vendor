<?php

namespace App\Http\Controllers\WholeSaler\Auth;

use App\Http\Controllers\Controller;
use App\Models\WholeSaler;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use App\Http\Requests\WholesalerRegisterRequest;
use Str;
use Session;

class RegisteredWholesalerController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

   
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
    public function store(WholesalerRegisterRequest $request)
    {
        try {
            $social = [
                '0' => 'https://www.example.com',
                '1' => 'https://www.twitter.com/username',
                '2' => 'https://www.instagram.com/username',
                '3' => 'https://www.facebook.com/username',
            ];
            $name = $request->first_name . ' ' . $request->last_name;
            $user = WholeSaler::create([
                'username' => $request->username,
                'name' => $name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'package_id' => 1,
                'social_links' => $social,
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