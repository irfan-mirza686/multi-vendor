<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use DB;

class HomeController extends Controller
{
    /********************************************************************/
    public function index()
    {
        function rand_color() {
            return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        }
        $pageTitle = "Admin Dashboard";
        $subscribers = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->orderBy('count')
        ->get();
        $newly_label = [];
        $newly_data = [];
        $color = [];

        foreach($subscribers as $user) {
            $newly_label['label'][] = $user->month_name;
            $newly_data['data'][] = (int) $user->count;
            $color[] = rand_color();
        }
        // echo "<pre>"; print_r($newly_label); exit();

        $subscriberLabels = $newly_label;
        $subscriberInfo = $newly_data;


        /*=============Products With GCP===============*/
        $products = Product::select(DB::raw("count(id) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
 
         
        $productsMonths = Product::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

      
        $subcribersProductData = [];
        $penMonthNum = range(1, 12);
        $penJoiner =  array_combine($productsMonths->toArray(), $products->toArray());
        foreach($penMonthNum as $number) {
            
            $checkPurMonth = isset($penJoiner[$number])? $penJoiner[$number]:0;
            if(isset($checkPurMonth) && ($checkPurMonth>0)){
                $subcribersProductData[] = $checkPurMonth;
            }else{
                $subcribersProductData[] = 0;
            }
        }
       

        /*================All Products===========*/


        /* Count Subscribers All Products Start */
        $allProducts = Product::select(DB::raw("count(id) as count"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
 
         
        $allProductsMonths = Product::select(DB::raw("Month(created_at) as month"))->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

      
        $subcribersAllProductData = [];
        $AllProdMonthNum = range(1, 12);
        $AllProdJoiner =  array_combine($allProductsMonths->toArray(), $allProducts->toArray());
        foreach($AllProdMonthNum as $number) {
            
            $checkAllProdMonth = isset($AllProdJoiner[$number])? $AllProdJoiner[$number]:0;
            if(isset($checkAllProdMonth) && ($checkAllProdMonth>0)){
                $subcribersAllProductData[] = $checkAllProdMonth;
            }else{
                $subcribersAllProductData[] = 0;
            }
        }
        /* Count Subscribers All Products Ends */

       
        return view('admin.master_dashboard',compact('subscriberLabels','subscriberInfo','subcribersProductData','subcribersAllProductData','color','pageTitle'));
    }
    /********************************************************************/

}
