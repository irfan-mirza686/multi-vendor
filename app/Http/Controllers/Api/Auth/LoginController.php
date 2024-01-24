<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*******************************************************************/
     public function store(Request $request)
    {
        $data = $request->all();
  
        $api_token = 'Bearer 123456';
       
        $header = $request->header('Authorization'); 
        
        $data = $request->header(); 
        $email = $data['email'][0];
        $password = $data['password'][0];
        if (empty($header)) {
            $message = 'Header Authorization is missing!';
            return response()->json([
                'status' => false,
                'message' => $message
            ],422);
        }else{
            if ($header == $api_token) {
                
                $user =  User::where('email',$data['email'])->first();
                
                if (!$user || !Hash::check($password,$user->password)) {
                    return response()->json([

                        'Email or password is incorrect'
                    ],404);
                }else{
                    return response()->json([

                 $user
                    ],200);
                }
            }else{
               
                $message = 'Header Authorization is incorrect!';
                return response()->json([
                    'status' => false,
                    'message' => $message
                ],422);
            }


        }
    }
    /*******************************************************************/
    public function updatePassword(Request $request)
    {
     $data = $request->all();
     if ($request->isMethod('post')) {
      

        /*Laravel Validation Start...................*/
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required_with:confirm_password|same:confirm_password|different:current_password',
            'confirm_password' => 'required'
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
                $getUser = User::find($data['subscriberID']);
                if(Hash::check($data['current_password'], $getUser->password)){
                    User::where('id',$data['subscriberID'])->update(['password' => bcrypt($data['new_password'])]);
                    return response()->json(200);
                }else{
                    return response()->json(['Current Password in incorrect'],422);
                }
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
    /*******************************************************************/
}
