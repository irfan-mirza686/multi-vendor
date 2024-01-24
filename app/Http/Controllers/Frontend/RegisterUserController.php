<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create(Request $request)
    {
        echo "<pre>"; print_r($request->all()); exit();
    }
}
