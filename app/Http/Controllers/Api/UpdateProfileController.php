<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UpdateProfileController extends Controller
{
    /*******************************************************/
    public function updateProfile(Request $request)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {

            /*Laravel Validation Start...................*/
            $rules = [
                'mobile' => 'required|numeric|min:12',
            ];
            
            $validator = Validator::make($data,$rules);
            if ($validator->fails()) {
                return response()->json($validator->errors(),422);
            }
            /*Laravel Validation End...................*/

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
                    User::where('id',$data['subscriberID'])->update([
                        'name' => $data['name'],
                        'company_name' => $data['company_name'],
                        'mobile' => $data['mobile'],
                        'company_address' => $data['company_address'],
                        'start_date' => date('Y-m-d',strtotime($data['start_date'])),
                        'end_date' => date('Y-m-d',strtotime($data['end_date'])),
                    ]);
                    return response()->json('Profile Update Successfully',200);
                }else{

                    $message = 'Header Authorization is incorrect!';
                    return response()->json([
                        'status' => false,
                        'message' => $message
                    ],422);
                }

            }
        }
    }
    /*******************************************************/
}
