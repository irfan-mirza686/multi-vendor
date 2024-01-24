<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

use Session;
use Auth;

class ProductsImport implements ToModel, WithValidation,  WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // echo "<pre>"; print_r($row); exit();
       
         Validator::make($row, [
           'productnamee' => 'required|unique:products',
           'sku' => ['numeric','min:12', 'unique:products'],
       ])->validate();
        $gtinMod = 0;
        if (Auth::user()->have_gcp=='no') {
        
            $gtinMod = ean13_check_digit($row['sku']);

        }else{

            $gtinMod = calculateGTIN();
            $subscriberBarcodes = getSubscriberBarcodes();
        if(intval($subscriberBarcodes)<=0){
         return; 
     }
        }

        
     
    
     $gcp = Auth::user()->gcp;

     $gln = Auth::user()->licensee_gln;

     return new Product([
        
        'ProductNameE' => $row['productnamee'],
        'sku' => $row['sku'],
        'BrandName'     => $row['brandname'],
        'ProductType'    => $row['producttype'],
        'Origin'    => $row['region'],
        'PackagingType'    => $row['packagingtype'],
        'MnfCode'    => $row['mnfcode'],
        'MnfGLN'    => $row['mnfgln'],
        'ProvGLN'    => $gln,
        'unit'    => $row['uom'],
        'size'    => $row['size'],
        'childProduct'    => $row['childproduct'],
        'quantity'    => $row['quantity'],
        'barcode'    => $gtinMod,
        'description'    => $row['description'],
        'GS1_GCP'      => $gcp,
        'CreatedByUserId' => Auth::user()->id,
    ]);
 }
 public function rules(): array
 {
    return [
            'productnamee' => Rule::unique('products', 'ProductNameE'), // Table name, field in your db
            'sku' => Rule::unique('products', 'sku') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'productnamee.unique' => 'Product Name is Duplicate',
            'sku.unique' => 'SKU is Duplicate'
        ];
    } 
}
