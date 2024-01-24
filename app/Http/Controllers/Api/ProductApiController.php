<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductApiController extends Controller
{
    /********************************************************************/
    public function productsList(Request $request)
    {
        $data = $request->all();
        
        if ($request->isMethod('post')) {


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
                    $products = Product::where('CreatedByUserId',$data['subscriberID'])->get();
                
                    if ($products) {
                        return response()->json($products,200);
                    }else{
                        return response()->json($products,404);
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
    /********************************************************************/
    public function productSearchDescription(Request $request)
    {
        $data = $request->all();

        if ($request->isMethod('post')) {
        

            $user_id = $data['subscriberID'];
            $search = $data['search'];
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


                    $products = Product::where('CreatedByUserId',$user_id)->when($search, function($query) use($search,$user_id){
                        $query->where('description','LIKE','%'.$search.'%')
                        ->where('CreatedByUserId',$user_id)->get();
                    })->get();

                
                    if ($products) {
                        return response()->json([$products],200);
                    }else{
                        return response()->json([$products],404);
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

    /********************************************************************/
    public function productSearchGTIN(Request $request)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
          

            $user_id = $data['subscriberID'];
            $search = $data['search'];
          
           
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


                    $products = Product::where('CreatedByUserId',$user_id)->when($search, function($query) use($search,$user_id){
                         $query->where('barcode','LIKE',$search)
                        ->where('CreatedByUserId',$user_id)->first();
                    })->first();

                
                    if ($products) {
                        return response()->json([$products],200);
                    }else{
                        return response()->json([$products],404);
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

    /********************************************************************/

    public function productSearchSKU(Request $request)
    {
        $data = $request->all();

        if ($request->isMethod('post')) {
         

            $user_id = $data['subscriberID'];
            $search = $data['search'];
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


                    $products = Product::where('CreatedByUserId',$user_id)->when($search, function($query) use($search,$user_id){
                        $query->where('sku','LIKE','%'.$search.'%')
                        ->where('CreatedByUserId',$user_id)->first();
                    })->first();
                    
                    if ($products) {
                        return response()->json([$products],200);
                    }else{
                        return response()->json([$products],404);
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

    /********************************************************************/

    public function UpdateProduct(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); exit();
        if ($request->isMethod('post')) {

           /*Laravel Validation Start...................*/
           $rules = [
            'subscriberID' => 'required',
            'product_id' => 'required',
            'gtin' => 'required',
            'location' => 'required',
            'qty' => 'required',
        ];

        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
        /*Laravel Validation End...................*/
            // echo "<pre>"; print_r($data); exit();

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
                try {
                   $getProduct = Product::where('CreatedByUserId',$data['subscriberID'])->where('id',$data['product_id'])->first();
                  
                    $products = Product::where('CreatedByUserId',$data['subscriberID'])->where('id',$data['product_id'])->update([
                        'barcode' => $data['gtin'],
                        'locations' => $data['location'],
                        'quantity' => $data['qty'],
                        'batch_no' => isset($data['batch_no'])?$data['batch_no']:$getProduct['batch_no'],
                        'expiry_date' => isset($data['expiry_date'])?date('Y-m-d',strtotime($data['expiry_date'])):$getProduct['expiry_date'],
                    ]);
                    return response()->json(200);
                } catch (Exception $e) {
                    return response()->json('Oop, something went wrong!',404);
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
    /********************************************************************/
    
}
