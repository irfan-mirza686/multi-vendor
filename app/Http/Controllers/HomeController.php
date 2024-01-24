<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Product;
use App\Models\JournalMaster;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
       
       function rand_color() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

        $productsbyGPC = Product::select('gpc')->where('CreatedByUserId',Auth::user()->id)->groupBy('gpc')->get()->toArray();
        $GPCNames = [];
        $gpcs = [];
        $color = [];
        foreach ($productsbyGPC as $key => $value) {
            $GPCNames[] = $value['gpc'];
            $gpcs[] = Product::select('gpc')->where('gpc',$value['gpc'])->where('CreatedByUserId',Auth::user()->id)->count();
            $color[] = rand_color();
        }
        // echo "<pre>"; print_r($color); exit();
        
        /*================All Products===========*/


        /* Count Subscribers All Products Start */
        $allProducts = Product::select(DB::raw("count(id) as count"))->where('CreatedByUserId',Auth::user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
 
         
        $allProductsMonths = Product::select(DB::raw("Month(created_at) as month"))->where('CreatedByUserId',Auth::user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

      
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

        /* Count Subscribers Journal Maset Start */
        $jornalMaster = JournalMaster::select(DB::raw("count(id) as count"))->where('CreatedByUserId',Auth::user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('count');
 
         
        $journalMonths = JournalMaster::select(DB::raw("Month(created_at) as month"))->where('CreatedByUserId',Auth::user()->id)->whereYear('created_at',date('Y'))->groupBy(DB::raw("Month(created_at)"))->pluck('month');

      
        $journalMasterData = [];
        $AllJournalMonthNum = range(1, 12);
        $AllJournalJoiner =  array_combine($journalMonths->toArray(), $jornalMaster->toArray());
        foreach($AllJournalMonthNum as $number) {
            
            $checkJournalMonth = isset($AllJournalJoiner[$number])? $AllJournalJoiner[$number]:0;
            if(isset($checkJournalMonth) && ($checkJournalMonth>0)){
                $journalMasterData[] = $checkJournalMonth;
            }else{
                $journalMasterData[] = 0;
            }
        }
        /* Count Subscribers Journal Maset Ends */
        return view('user.master_dashboard',compact('subcribersAllProductData','journalMasterData','GPCNames','gpcs','color'));
    }
}
