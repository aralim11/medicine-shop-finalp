<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

session_start();

use Illuminate\Support\Facades\Redirect;

class SellerDashController extends Controller {

    public function index() {

        $this->auth_check();
        
        $home = view('seller.seller_page.home');

        return view('seller.sellerMaster')
                ->with('seller_main_comtent', $home);
    }

    public function auth_check() {
        $seller_id = Session::get('seller_id');
        if ($seller_id == NULL) {
            return Redirect::to('/seller')->send();
        }
    }


    //Seller Content
    public function addBrand() {
        $this->auth_check();
        $add_category = view('seller.seller_page.addBrand');

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $add_category);
    }

    public function saveBrand(Request $request) {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        $supplier_name = $request->supplier_name;
        
        

        $data = array();
        $data['seller_id'] = $seller_id;
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_description'] = $request->supplier_description;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['created_at'] = date('y-m-d h:i:s');


        $brand_data = DB::table('suppliers')
                ->where('seller_id', $seller_id)
                ->where('supplier_name', $supplier_name)
                ->first();

        if ($brand_data == null) {
            DB::table('suppliers')
                    ->insert($data);
            Session::put('message', 'Save Brand Name Successfully !');
            return Redirect::to('/add/brand');
        } else {
            Session::put('exception', 'Already In Database! Type Another.');
            return Redirect::to('/add/brand');
        }
    }

    public function manageBrand() {
        $this->auth_check();
        $seller_id = Session::get('seller_id');
        
        $all_brand = DB::table('suppliers')
                ->where('seller_id', $seller_id)
                ->get();

        $view_brand = view('seller.seller_page.viewBrand')
                ->with('all_brand', $all_brand);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $view_brand);
    }

    public function editBrand($brandId) {
        $this->auth_check();
        $seller_id = Session::get('seller_id');

        $brandById = DB::table('suppliers')
                ->where('supplier_id', $brandId)
                ->where('seller_id', $seller_id)
                ->first();

        $editBrand = view('seller.seller_page.editBrand')
                ->with('brandById', $brandById);

        return view('seller.sellerMaster')
                        ->with('seller_main_comtent', $editBrand);
    }

    public function updateBrand(Request $request) {
        $supplier_id = $request->supplier_id;
        $seller_id = Session::get('seller_id');
        $supplier_name = $request->supplier_name;
        $supplier_phone = $request->supplier_phone;
        
        $brand_data = DB::table('suppliers')
                ->where('seller_id', $seller_id)
                ->where('supplier_name', $supplier_name)
                ->first();
        
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['supplier_description'] = $request->supplier_description;
        $data['created_at'] = date('y-m-d');
       
        if ($brand_data == null) {
            
            DB::table('suppliers')
                ->where('supplier_id', $supplier_id)
                ->where('seller_id', $seller_id)
                ->update($data);
            
            Session::put('message', 'Update Brand Successfully !');
            return Redirect::to('/view/brand');
            
        } else {
            
        $sdata = array();
        $sdata['supplier_phone'] = $request->supplier_phone;
        $sdata['supplier_description'] = $request->supplier_description;
        $sdata['created_at'] = date('y-m-d');
            
            DB::table('suppliers')
                ->where('supplier_id', $supplier_id)
                ->where('seller_id', $seller_id)
                ->update($sdata);
            
            Session::put('exception', 'Already In Database! Type Another.');
            return Redirect::to('/view/brand');
        }

    }

    public function deleteBrand(){



    }


    public function sellerLogout() {

        Session::put('seller_id');
        Session::put('seller_name');
        Session::put('exception', '');
        return Redirect::to('/seller');
    }

}
