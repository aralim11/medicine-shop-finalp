<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Image;

class ProductController extends Controller {
    
    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }

    public function addProduct() {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        $all_supplier = DB::table('suppliers')
                ->where('seller_id',$seller_id)
                ->get();

        $add_product = view('seller.seller_page.addProduct')
                ->with('all_supplier', $all_supplier);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $add_product);
    }

    public function saveProduct(Request $request) {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        $sellerdata = DB::table('sellers')
                ->where('seller_id', $seller_id)
                ->first();
         
        $data = array();
        $data['seller_id'] = $seller_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_name'] = $request->product_name;
        $data['product_mg'] = $request->product_mg;
        $data['product_details'] = $request->product_details;
        $data['purchase_price'] = $request->purchase_price;
        $data['sale_price'] = $request->sale_price;
        $data['retail_price'] = $request->retail_price;
        $data['district_id'] = $sellerdata->seller_district;
        $data['pstation_id'] = $sellerdata->seller_policeStation;
        $data['vat_tax'] = $request->vat_tax;

        $data['created_at'] = date('y-m-d');

        $image = $request->file('product_picture');

        
        $ext = strtolower($image->getClientOriginalExtension());
        $image_size = $image->getClientSize();


        if ($image_size < 2097152 && ($ext == 'jpg' || $ext == 'png')) {
            $image_name = str_random(20);
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/product_picture/';
            $image_url = $upload_path . $image_full_name;
            $success = Image::make($image)->resize(300,200)->save($image_url);
            if ($success) {
                $data['product_picture'] = $image_url;
                DB::table('tbl__products')
                        ->insert($data);
                Session::put('message', 'Save Product Information Successfully !');
                return Redirect::to('/add/product');
            } else {
                Session::put('message', 'Save Product Information Successfully !');
                return Redirect::to('/add/product');
            }
        } else {
            DB::table('tbl__products')
                    ->insert($data);
            Session::put('message', 'Save Product Information Successfully !');
            return Redirect::to('/add/product');
        }
    }
    
    
        public function manageProduct() {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        $all_product = DB::table('tbl__products')
                ->where('seller_id',$seller_id)
                ->get();

        $view_product = view('seller.seller_page.viewProduct')
                      ->with('all_product', $all_product);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $view_product);
    }

 
    
    public function editProduct($product_id) {
        
        $this->auth_check();
        $seller_id = Session::get('seller_id');

        $all_product = DB::table('tbl__products')
                ->join('suppliers', 'tbl__products.seller_id', '=', 'suppliers.seller_id')
                ->where('product_id', $product_id)
                ->select('tbl__products.*', 'suppliers.*')
                ->first();
        
        

        $edit_product = view('seller.seller_page.editProduct')
                                 ->with('all_products', $all_product);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $edit_product);
    }
    
    
    
    
    
    public function updateProduct(Request $request){
       $seller_id = Session::get('seller_id');
       $this->auth_check();
       
       $product_id = $request->product_id;
       $data = array();
       
        $data['seller_id'] = $seller_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_name'] = $request->product_name;
        $data['product_mg'] = $request->product_mg;
        $data['product_details'] = $request->product_details;
        $data['purchase_price'] = $request->purchase_price;
        $data['sale_price'] = $request->sale_price;
        $data['retail_price'] = $request->retail_price;
        $data['vat_tax'] = $request->vat_tax;

        $data['updated_at'] = date('y-m-d h:i:s');
        
        $image = $request->file('product_picture');
         
        
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/product_picture/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_picture'] = $image_url;
              
                DB::table('tbl__products')
                        ->where('product_id', $product_id)
                        ->update($data);

                $old_product_picture_path = $request->old_product_picture_path;
                unlink($old_product_picture_path);


                Session::put('message','Product Update Succesfully!');
                return Redirect::to('/view/product');
            } else {
                dd($data);
            }
            
        }
          
    }
    
    public function deleteProduct($id){
         $seller_id = Session::get('seller_id');
        DB::table('tbl__products')
                ->where('seller_id',$seller_id)
                ->where('product_id',$id)
                ->delete();
        return Redirect::to('/view/product');
    }
    
    

}
