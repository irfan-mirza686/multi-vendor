<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JournalMaster;
use App\Models\JournalDetail;
use App\Models\User;

class JournalMasterController extends Controller
{
    public function journalMaster(Request $request,$email=null)
    {

   
        $api_token = '123456';
        $header = $request->header('Authorization'); 
        if (empty($header)) {
            $message = 'Test Authorization is missing!';
            return response()->json([
                'status' => false,
                'message' => $message
            ],422);
        }else{
            if ($header == "Bearer ".$api_token) {
                $user = User::where('email',$email)->first();

                if ($user!=null) {
                    $jourla_master = JournalMaster::where('CreatedByUserId',$user->id)->get();
                  
                        return response()->json($jourla_master);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Data Not Found'
                    ],404);
                }
            }else{
                $message = 'Else Authorization is incorrect!';
                return response()->json([
                    'status' => false,
                    'message' => $message
                ],401);
            }
            
        }
    }
    /**************************************************************/
    public function storeJournalDetails(Request $request)
    {
        if ($request->isMethod('post')) {
         $data = $request->all();
         $api_token = '123456';
         $header = $request->header('Authorization'); 
         if (empty($header)) {
            $message = 'Header Authorization is missing!';
            return response()->json([
                'status' => false,
                'message' => $message
            ],422);
        }else{
            if ($header == "Bearer ".$api_token) {
                if (empty($request->journal_id) || empty($request->created_date) ||empty($request->start_date) ||empty($request->gtin) ||empty($request->sku) ||empty($request->qty) ||empty($request->batch_no) ||empty($request->expiry_date) ||empty($request->item_description) ||empty($request->locations) ||empty($request->item_price)) {
                    return response()->json([
                        'status' => false,
                        'message' => 'please enter the all fields'
                    ],422);
                }

                $journal_details = new JournalDetail;
                $journal_details->journal_id = $data['journal_id'];
                $journal_details->created_date = date('Y-m-d',strtotime($data['created_date']));
                $journal_details->start_date = date('Y-m-d',strtotime($data['start_date']));
                $journal_details->gtin = $data['gtin'];
                $journal_details->sku = $data['sku'];
                $journal_details->qty = $data['qty'];
                $journal_details->batch_no = $data['batch_no'];
                $journal_details->expiry_date = date('Y-m-d',strtotime($data['expiry_date']));
                $journal_details->item_price = $data['item_price'];
                $journal_details->item_description = $data['item_description'];
                $journal_details->locations = $data['locations'];
                $journal_details->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Journal Details instered successfully'
                ],200);
            }else{
                $message = 'Header Authoriza
                tion is incorrect!';
                return response()->json([
                    'status' => false,
                    'message' => $message
                ],422);
            }
        }
    }
}

    /**************************************************************/
}
