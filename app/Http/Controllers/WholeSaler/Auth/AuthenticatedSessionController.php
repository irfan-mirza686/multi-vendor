<?php

namespace App\Http\Controllers\WholeSaler\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\WholeSalerLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('wholesaler.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\WholeSalerLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WholeSalerLoginRequest $request)
    {
        // dd($request->all());
        // dd('admin');
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::WHOLESALER_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('wholesaler')->logout();
        // Session::flush();
        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect(route('wholesaler.login'));
    }
}
