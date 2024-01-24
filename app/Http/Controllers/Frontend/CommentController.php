<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductComment;
use Session;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        date_default_timezone_set((config('app.timezone')));
        $currentDate = date('Y-m-d h:i:s');
        $data = $request->all();
        $comment = new ProductComment;
        $comment->wholsaler_prodcut_id = $data['product_id'];
        $comment->comment = $data['comment'];
        $comment->date = $currentDate;
        $comment->commentByUser = 1;
        $comment->save();
        Session::flash('flash_message_success','Your Comment is under review');
        return redirect()->back();
       
    }
}