<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WholeSalerMsgsController extends Controller
{
    public function index()
    {
        return view('admin.messages.wholesaler.index');
    }
}
