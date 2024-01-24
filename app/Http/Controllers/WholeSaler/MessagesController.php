<?php

namespace App\Http\Controllers\WholeSaler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class MessagesController extends Controller
{
    public function index()
    {
        $vendors = Vendor::get();
        return view('wholesaler.messages.index',compact('vendors'));
    }
}
