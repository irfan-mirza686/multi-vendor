<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\VendorProduct;
use App\Models\JournalMaster;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
       
       function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
    $pageTitle = "Vedor Dashboard";
        $productsbyGPC = VendorProduct::where('vendor_id',Auth::guard('vendor')->user()->id)->get()->toArray();
        $GPCNames = [];
        $gpcs = [];
        $color = [];
        foreach ($productsbyGPC as $key => $value) {
            $GPCNames[] = '';
            $gpcs[] = VendorProduct::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
            $color[] = rand_color();
        }
        // echo "<pre>"; print_r($color); exit();
        
        /*================All Products===========*/


        /* Count Subscribers All Products Start */
        $allProducts = VendorProduct::select(DB::raw("count(id) as count"))->where('vendor_id',Auth::guard('vendor')->user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
 
         
        $allProductsMonths = VendorProduct::select(DB::raw("Month(created_at) as month"))->where('vendor_id',Auth::guard('vendor')->user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

      
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

         /*================All Products===========*/

        
        $journalMasterData = array();
        /* Count Subscribers Journal Maset Ends */
        return view('vendor_panel.master_dashboard',compact('subcribersAllProductData','journalMasterData','color','pageTitle'));
    }
}
